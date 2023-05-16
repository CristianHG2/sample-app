<?php

namespace Lifespikes\Support\Transformers;

use Illuminate\Database\Eloquent\Model;
use Spatie\TypeScriptTransformer\Structures\TransformedType;
use Spatie\TypeScriptTransformer\Transformers\Transformer;

/**
 * @phpstan-type ColumnDefinition array{name: string, type: string}
 *
 * @template T of Model
 */
class ModelTransformer implements Transformer
{
    /**
     * @var \ReflectionClass<T>
     */
    private \ReflectionClass $reflection;

    /**
     * @template TReflection of \ReflectionClass
     *
     * @param  TReflection  $class
     *
     * @throws \Throwable
     */
    public function transform(\ReflectionClass $class, string $name): ?TransformedType
    {
        $this->reflection = $class;

        return $class->isSubclassOf(Model::class) ? TransformedType::create(
            $class,
            $name,
            $this->generateScript()
        ) : null;
    }

    private function generateScript(): string
    {
        $types = implode(';'.PHP_EOL, array_map(function (array $column) {
            return '  '.$column['name'].': '.$column['type'];
        }, $this->typeColumns()));

        return '{'.PHP_EOL.$types.PHP_EOL.'}';
    }

    /**
     * @return ColumnDefinition[]
     *
     * @throws \ReflectionException
     */
    private function typeColumns(): array
    {
        $builder = ($instance = $this->model())->getConnection()->getSchemaBuilder();
        $columns = $builder->getColumnListing($table = $instance->getTable());

        return array_map(function ($column) use ($builder, $table) {
            return [
                'name' => $column,
                'type' => match ($builder->getColumnType($table, $column)) {
                    'integer', 'float', 'double', 'bigint' => 'number',
                    'boolean' => 'boolean',
                    default => 'string',
                },
            ];
        }, $columns);
    }

    /**
     * @return T
     *
     * @throws \ReflectionException
     */
    private function model(): Model
    {
        return $this->reflection->newInstance();
    }
}
