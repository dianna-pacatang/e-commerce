const form = document.getElementById('itemForm');
const table = document.querySelector('.form-table');
const container = document.querySelector('.background');

form.addEventListener('submit', function (event) {
  event.preventDefault(); 

  const itemName = form.elements.itemName.value;
  const description = form.elements.description.value;
  const amount = form.elements.amount.value;
  const supplierID = form.elements.supplierID.value;

  const newRow = document.createElement('tr');
  newRow.className = 'form-option';
  newRow.innerHTML = `
    <td>${itemName}</td>
    <td>${description}</td>
    <td>${amount}</td>
    <td>${supplierID}</td>
  `;

  table.appendChild(newRow);

  form.reset();
});

const addItemButton = document.getElementById('addItemButton');
addItemButton.addEventListener('click', function (event) {
  event.preventDefault(); 
  const newRow = document.createElement('tr');
  newRow.className = 'form-option';
  newRow.innerHTML = `
    <td><input type="text" name="itemName" /></td>
    <td><input type="text" name="description" /></td>
    <td><input type="text" name="amount" /></td>
    <td><input type="text" name="supplierID" /></td>
  `;

  table.appendChild(newRow);
});

form.addEventListener('submit', function (event) {
  event.preventDefault(); 

  const newForm = document.createElement('form');
  newForm.className = 'form-container';
  newForm.id = 'itemForm';

  const itemNameInput = document.createElement('input');
  itemNameInput.type = 'text';
  itemNameInput.name = 'itemName';
  itemNameInput.placeholder = 'Item Name';

  const descriptionInput = document.createElement('input');
  descriptionInput.type = 'text';
  descriptionInput.name = 'description';
  descriptionInput.placeholder = 'Description';

  const amountInput = document.createElement('input');
  amountInput.type = 'text';
  amountInput.name = 'amount';
  amountInput.placeholder = 'Amount';

  const supplierIDInput = document.createElement('input');
  supplierIDInput.type = 'text';
  supplierIDInput.name = 'supplierID';
  supplierIDInput.placeholder = 'Supplier ID';

  const addButton = document.createElement('button');
  addButton.type = 'submit';
  addButton.className = 'form-button';
  addButton.textContent = 'Add Item';

  // Append the inputs and button to the form
  newForm.appendChild(itemNameInput);
  newForm.appendChild(descriptionInput);
  newForm.appendChild(amountInput);
  newForm.appendChild(supplierIDInput);
  newForm.appendChild(addButton);


  form.replaceWith(newForm);
});
