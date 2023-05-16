import React, {FC, ReactNode} from 'react';
import {Box, BoxProps} from '@chakra-ui/react';

const Section: FC<{children: ReactNode} & BoxProps> = ({children, ...props}) => {
  return (
    <Box w="full" p={4} bg="white" rounded="md" boxShadow="sm" {...props}>
      {children}
    </Box>
  );
};

export default Section;
