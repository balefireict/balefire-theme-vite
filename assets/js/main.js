// Your JavaScript code here
document.addEventListener('DOMContentLoaded', function() {
    console.log('Balefire theme loaded');
});

import '../css/main.css'

// Add this for PHP refresh support
if (import.meta.hot) {
    import.meta.hot.accept(() => {
        console.log('HMR update')
    })
}

// Export any modules if needed
export {};
