import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import { fileURLToPath, URL } from 'node:url'
import { resolve, dirname } from 'node:path'

const __dirname = dirname(fileURLToPath(import.meta.url))

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'assets/js/main.js',
                'assets/css/main.css'
            ],
            publicDirectory: 'assets',
            refresh: [
                {
                    paths: [
                        '**/*.php',
                    ],
                    config: { delay: 300 }
                },
            ],
        }),
    ],
    server: {
        host: 'localhost',
        port: 5173,
        watch: {
            usePolling: true,
            include: [
                // Your existing paths
                '**/*.php',    // Watch PHP files
                '**/*.css',    // Watch CSS files
                '**/*.js',     // Watch JS files
            ]
        }
    },
    build: {
        outDir: resolve(__dirname, 'dist'),
        emptyOutDir: true,
        manifest: true,
        rollupOptions: {
            input: {
                main: resolve(__dirname, 'assets/js/main.js'),
                style: resolve(__dirname, 'assets/css/main.css')
            },
            output: {
                assetFileNames: (assetInfo) => {
                    if (assetInfo.name.endsWith('.css')) {
                        return 'assets/[name]-[hash][extname]'
                    }
                    return 'assets/[name]-[hash][extname]'
                }
            }
        }
    }
})
