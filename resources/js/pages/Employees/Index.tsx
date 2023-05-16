import React, {FC} from 'react';
import Layout from '../../layouts/Layout';
import Section from '../../components/Section';
import ListEmployees from '../../../../packages/employees/resources/components/ListEmployees';

const Index: FC<object> = () => {
  return (
    <Layout title="Home">
      <Section>
        <ListEmployees />
      </Section>
    </Layout>
  )
};

export default Index;
