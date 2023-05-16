declare namespace Lifespikes.Contracts.Employees.Enums {
export type PayFrequency = 'weekly' | 'biweekly';
export type PayType = 'hourly' | 'salary';
}
declare namespace Lifespikes.Employees.Objects.Requests {
export type EmployeeData = {
first_name: string;
middle_name: string | null;
last_name: string;
pay_type: Lifespikes.Contracts.Employees.Enums.PayType;
pay_rate: number;
pay_frequency: Lifespikes.Contracts.Employees.Enums.PayFrequency;
};
}
