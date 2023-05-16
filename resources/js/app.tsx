import React from 'react';
import {createInertiaApp} from '@inertiajs/react';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {createRoot} from 'react-dom/client'
import {ChakraProvider, ColorModeScript} from '@chakra-ui/react'

void createInertiaApp({
  resolve: (name: string) =>
    resolvePageComponent(
      `./pages/${name}.tsx`,
      // @ts-ignore
      import.meta.glob('./pages/**/*.tsx'),
    ),
  setup: function ({el, App, props}) {
    createRoot(el).render(
      <ChakraProvider>
        <ColorModeScript />
        <App {...props} />
      </ChakraProvider>
    )
  },
});
