document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('order-form');

    let selectedProviders = [];

    form.addEventListener('submit', function(event) {

        event.preventDefault();

        if (validateForm()) {
            form.submit();
        }
    });

    
    const providerCheckboxes = document.querySelectorAll('input[name="supplier"]');
    providerCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function(event) {
            const selectedProvider = this.value;
            if (this.checked) {
          
                if (selectedProviders.length < 2) {
                    selectedProviders.push(selectedProvider);
                } else {
                    this.checked = false; 
                }
            } else {
              
                const index = selectedProviders.indexOf(selectedProvider);
                if (index > -1) {
                    selectedProviders.splice(index, 1);
                }
            }
        });

        checkbox.addEventListener('dblclick', function(event) {
            this.checked = false; 
            const selectedProvider = this.value;
            const index = selectedProviders.indexOf(selectedProvider);
            if (index > -1) {
                selectedProviders.splice(index, 1);
            }
        });
    });

    function validateForm() {
        // Get form field values
        const services = document.querySelectorAll('input[name="services[]"]:checked');
        const subscription = document.getElementById('subscription').value;
        const payment = document.getElementById('payment').value;
        const customerNumber = document.getElementById('customer-number').value;

        if (services.length === 0) {
            alert('Please select at least one service.');
            return false;
        }

        if (services.length > 2) {
            alert('Please select only two services.');
            return false;
        }

        if (subscription === '') {
            alert('Please select a subscription.');
            return false;
        }

        if (payment === '') {
            alert('Please select a payment method.');
            return false;
        }

        if (selectedProviders.length !== 2) {
            alert('Please select exactly two service providers.');
            return false;
        }

        if (customerNumber === '') {
            alert('Please enter a customer number.');
            return false;
        }

        return true;
    }
});
