function addProduct(){
    var myform = document.getElementById('myform');
    var myproducts = document.getElementById('myproducts');
    var addBtn = document.getElementById('add-btn');
    if(addBtn.innerText === 'Products'){
        addBtn.innerText = 'Add +';
    }
    else{

        addBtn.innerText ='Products';
    }
    myform.classList.toggle('showForm');
    // myproducts.classList.toggle('closeProducts');
}