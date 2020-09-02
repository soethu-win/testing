
$(document).ready(function(){
    getData();
    //update_cart_count()
    $('.add_to_cart').click(function(){

        var id=$(this).data('id');
        var name=$(this).data('name');
        var price=$(this).data('price');
        var photo=$(this).data('photo');
        var discount=$(this).data('discount');
        var codeno=$(this).data('codeno');
        
        //console.log(id);

         var item={id:id,name:name,price:price,photo:photo,
                 discount:discount,codeno:codeno,qty:1};
        //console.log(item);
        var oldproduct=localStorage.getItem('product');
        if(oldproduct == null){
            var product= new  Array();
        }else{
            var product=JSON.parse(oldproduct);

        }
        var exit;
        $.each(product,function (i,v) {
            if(id==v.id){
                v.qty++;
                exit=true;
            }
        })
        if(!exit){
            product.push(item);
        }

        localStorage.setItem('product', JSON.stringify(product));
        getData();



        
    })
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
   });
    function getData(){
        var myproduct=localStorage.getItem('product');
        console.log(myproduct);

        var  table=$('#shoppingcart_table');
        var foot=$('#shoppingcart_tfoot')
        var result='';
        var footer='';
        if(myproduct!=null){
            product=JSON.parse(myproduct);
            var total=0;


            $.each(product,function (i,v) {
                subtotal1=v.price*v.qty;
                
                dis=v.price*v.discount/100;
                subtotol2=subtotal1-dis*v.qty;
                total+=subtotol2;
                //  if(v.discount!=0){
                //     $('#dd').show();
                // }else{
                //     $("#dd").hide();
                // }
                result+=`
                       <tr>
                            <td>
                                <button class="btn btn-outline-danger remove btn-sm"  data-id="${i}" style="border-radius: 50%"> 
                                    <i class="icofont-close-line"></i> 
                                </button> 
                            </td>
                            <td> 
                                <img src="${v.photo}" class="cartImg">                     
                            </td>
                            <td> 
                                <p> ${v.name}</p>
                                <p> ${v.codeno}</p>
                            </td>
                            <td>
                                <button class="btn btn-outline-secondary plus_btn" data-id="${i}"> 
                                    <i class="icofont-plus "></i> 
                                </button>
                            </td>
                            <td>
                                <p> ${v.qty}</p>
                            </td>
                            <td>
                                <button class="btn btn-outline-secondary minus_btn" data-id="${i}"> 
                                    <i class="icofont-minus"></i>
                                </button>
                            </td>
                            <td>

                                <p class="text-danger"> 
                                    ${v.price}
                                </p>
                                
                                
                               
                                  <p class="font-weight-lighter" id="dd"> 
                                    <del> ${dis}Ks </del> </p>
                                
                               
                                
                                
                               

                                   
                                 
                            </td>
                            <td>
                                ${subtotol2}Ks
                            </td>
                        </tr>
                        `;
                       
            })

             footer+=`<tr>
                            <td colspan="8">
                                <h3 class="text-right"> Total : ${total}Ks </h3>
                            </td>
                        </tr>
                        <tr> 
                            <td colspan="5"> 
                                <textarea class="form-control" id="notes" placeholder="Any Request..."></textarea>
                            </td>
                            <td colspan="3">
                                <button class="btn btn-secondary btn-block mainfullbtncolor checkoutbtn buy_now"> 
                                    Check Out 
                                </button>
                            </td>
                        </tr>`;
            //console.log(result);
           // result+=`<td colspan='3'align='center'>Total:$${total}`;

        }
        //console.log(result);
        table.html(result);
        foot.html(footer);
    }
     $('#shoppingcart_table').on('click','.plus_btn',function() {
                
                var id=$(this).data('id');

                var myproduct=localStorage.getItem('product');
                var product=JSON.parse(myproduct);
                $.each(product,function(i,v){
                    if(i==id){
                        v.qty++;
                    }
                })
                localStorage.setItem('product', JSON.stringify(product));
                getData();
                
            })
      $('#shoppingcart_table').on('click','.minus_btn',function () {
                
                var id=$(this).data('id');

                var myproduct=localStorage.getItem('product');
                var product=JSON.parse(myproduct);
                
                $.each(product,function(i,v){
                    if(i==id ){
                        v.qty--;
                    }
                })
                localStorage.setItem('product', JSON.stringify(product));
                getData();
            })
      $('#shoppingcart_table').on('click','.remove',function () {


                let index=$(this).data('id');
                var myproduct=localStorage.getItem('product');
                product=JSON.parse(myproduct);
                //localStorage.removeItem(index,1);
                product.splice(index,1);

                localStorage.setItem('product', JSON.stringify(product));
                getData();
            })

      $('.buy_now').on('click',function(){
        var notes=$('#notes').val();
        //console.log(notes);
        var shopString=localStorage.getItem("product");
        if(shopString){
            $.post('/orders',{shop_data:shopString,notes:notes},function(response){
                if(response){
                    alert(response);
                    localStorage.clear();
                    getData();
                    location.href="/";
                }
            })
        }
      })
       // function update_cart_count(){
       //      var myproduct=localStorage.getItem('product');
       //      if(myproduct){
       //        var myproduct_obj=JSON.parse(myproduct);
       //        if(myproduct_obj.product_list.length){
       //          var total=0;
       //          $.each(mycart_obj.product_list,function(i,v){
       //            //console.log(i,v);
       //            total+=v.qty;
       //          })
       //          $(".cart_item_count").html(total);
       //        }else{
       //          $(".cart_item_count").html(0);
       //        }

       //      }
       //      else{
       //        $(".cart_item_count").html(0);

       //      }

       //    }
       
    
})