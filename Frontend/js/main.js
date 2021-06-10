const btn = document.querySelector("#btn_load")
const product = document.querySelector("#products")
const btn_delete = document.querySelector(".btn-add__delete")

const edit_image = document.querySelector("#edit_image")
const edit_id = document.querySelector('input[name="id"]')
const edit_title = document.querySelector("#edit_title")
const edit_price = document.querySelector("#edit_price")
const edit_category = document.querySelector("#edit_category")
const edit_description = document.querySelector("#edit_description")

const readProduct = async (withLoader = true, duration = 1000) => {
  product.innerHTML = ''
  
  const res = await fetch("http://localhost/ProductApp/Backend/api/product/read.php").then(isLoading = false)
  const data = await res.json();
  console.log(data);

  if (withLoader) {
    product.innerHTML = '<div class="lds-dual-ring"></div>'
    await new Promise(r => setTimeout(r, duration))
    product.innerHTML = ''
  }
  

  let output = "";

       
        for (let i=0 ; i<data.length; i++) {
          output += 
          /*html*/ `<div class="col-md-3">
          <div class="ibox">
            <div class="ibox-content product-box">
              <div class="product-imitation">
                <img src="img/${data[i].image}">
              </div>
              <div class="product-desc">${data[i].description}<span class="product-price">${data[i].price}</span><small class="text-muted">${data[i].category}</small><a href="#" class="product-name">${data[i].title}</a>
  
                <div class="small m-t-xs">${data[i].price}</div>
                <div class="m-t text-righ">
                  <a href="#" class="btn btn-xs btn-outline btn-primary btn-card">Add to Cart <i class="fa fa-long-arrow-right"></i>
                  </a>
                </div>
                <div class="crud-box">

                <button class="btn btn-xs btn-outline btn-danger btn-card btn-add__delete" onclick="deleteProduct(${data[i].id})">delete <i class="fa fa-trash"></i>
                </button>
                <button  class="btn btn-xs btn-outline btn-success btn-card btn-add__edit float-right"   data-toggle="modal"
                data-target="#edit-modal" onclick="fetchOne(${data[i].id})">edit <i class="fa fa-edit"></i>
                </button>
              </div>
              </div>
            </div>
          </div>
        </div>`
         ;

      
        }
        product.insertAdjacentHTML("afterbegin", output);
      };
// document.addEventListener("load",readProduct)
readProduct();

function deleteProduct(id){
  obj = {
    id: `${id}`
}

fetch('http://localhost/ProductApp/Backend/api/product/delete.php', {
    method: 'DELETE',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify(obj)
}).then(res => res.json())
.then(data => console.log(data))
readProduct(true, 250)

}


const fetchOne = async (id) => {
  fetch(`http://localhost/ProductApp/Backend/api/product/read_single.php?id=${id}`)
    .then(res => res.json())
    .then(data => {
      console.log(data)
      // edit_image.value = data.image
      edit_id.value = data.id
      edit_title.value = data.title
      edit_price.value =data.price
      edit_category.value = data.category
      edit_description.value = data.description
    })
}

const editProduct = async () => {

  const editModal = document.querySelector('#editForm')
  const inputs = Array.from(editModal.querySelectorAll('input[type="text"]'))
  const imageInput = editModal.querySelector('input[type="file"]')

  let data = {}

  inputs.forEach(input => {
    data[`${input.name}`] = input.value;
  })

  const formData = new FormData()

  formData.append('file', imageInput.files[0])





  fetch('http://localhost/ProductApp/Backend/api/product/update.php', {
    method: 'PUT',
    headers: {
      'content-type': 'application/json'
    },
    body: JSON.stringify(data)
  })
    .then(res => res.json())
    .then(data => console.log(data))

    fetch('http://localhost/ProductApp/Backend/api/product/postImage.php', {
      method: 'POST',
      // headers: {
      //   'content-type': 'multipart/form-data'
      // },
      body: formData
    })
      .then(res => res.json())
      .then(data => console.log(data))
}
