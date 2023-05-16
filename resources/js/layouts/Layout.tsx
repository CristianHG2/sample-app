import React, {FC, ReactNode} from 'react';
import {Box, Heading} from '@chakra-ui/react';

const Layout: FC<{children: ReactNode, title: string}> = ({children, title}) => {
  return (
    <Box w="full" minH="100vh" bg="gray.50">
      <Box p={4} w="full" bg="white" borderBottom="1px solid" borderColor="gray.200" boxShadow="md">
        Sample App
      </Box>

      <Box maxW="6xl" mx="auto" p={4}>
        <Heading my={6} fontWeight="medium">{title}</Heading>

        {children}
      </Box>
    </Box>
  );
};

export default Layout;
