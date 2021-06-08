const btn = document.querySelector("#btn_load")
const product = document.querySelector("#products")

      const myfunction = async () => {
        const res = await fetch("http://localhost/ProductApp/api/products.php");
        const data = await res.json();
        console.log(data);
        let output = "";
       
        for (let i=0 ; i<data.length; i++) {
          output += 
          `<div class="col-md-3">
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

                <a href="#" class="btn btn-xs btn-outline btn-danger btn-card btn-add__delete">delete <i class="fa fa-trash"></i>
                </a>
                <a href="#" class="btn btn-xs btn-outline btn-success btn-card btn-add__edit float-right">edit <i class="fa fa-edit"></i>
                </a>
              </div>
              </div>
            </div>
          </div>
        </div>`
         ;

      
        }
        product.insertAdjacentHTML("afterend", output);
      };
// btn.addEventListener("click",myfunction)
myfunction();