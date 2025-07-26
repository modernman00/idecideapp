// Sample JavaScript test
describe('Basic Math', () => {
    test('adds 1 + 2 to equal 3', () => {
        expect(1 + 2).toBe(3);
    });
    
    test('multiplication works', () => {
        expect(2 * 3).toBe(6);
    });
});

// Test jQuery if available
if (typeof $ !== 'undefined') {
    describe('jQuery', () => {
        test('jQuery should be available', () => {
            expect(typeof $).toBe('function');
        });
    });
}
