<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'forms/head.php' ?>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include_once 'forms/header.php' ?>
   <!-- End Header -->
   <!-- ======= Sidebar ======= -->
   <?php if(($this->session->typeUser) && ($this->session->typeUser === 'client' || $this->session->typeUser ==="Client")) :?> 
        <?php include_once 'forms/menu.php'?>
  <?php elseif(($this->session->typeUser) && ($this->session->typeUser === 'livraison')) :?>    
        <?php include_once 'forms/AdminLivraison/menu.php'?>
  <?php elseif(($this->session->typeUser) && ($this->session->typeUser === 'maintenance')) :?> 
        <?php include_once 'forms/AdminMaintenance/menu.php'?>
  <?php elseif(($this->session->typeUser) && ($this->session->typeUser === 'commande')) :?> 
        <?php include_once 'forms/AdminClients/menu.php'?>
  <?php endif;?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=site_url('Control/welcome')?>">Home</a></li>
          <li class="breadcrumb-item">Facture</li>
          <li class="breadcrumb-item active">Nouvelle Facture</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" >
            <form>
                <div class="card-body">
                  <h5 class="card-title">Facture Client</h5>
                  <button type="button" class="btn btn-primary"><i class="ri-add-box-fill"></i> Create</button>   <button type="button"  class="btn btn-primary"><i class="ri-edit-line"></i> Edit</button> 
                  <div class="card info-card customers-card" style="height:450px;">

                    <div class="filter">
                      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                          <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                      </ul>
                    </div>
            <div id="facturePrint">
                  <div class="card-body" >
                    <img src="<?= base_url('assets/') ?>vendorsAdmin/img/logo.svg">
                      <h5 class="card-title">Draft Bill <span>| This Year</span></h5>
                    
                      <div class="d-flex align-items-center" style="width:450px;margin-top:-10px;">
                      
                        <div class="ps-3">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bx bxs-user-detail"></i>
                          </div>
                          <h6 style="font-size:medium;">Customer</h6>
                          <label for="basic-adresse" class="form-label"><i class="bi bi-geo-alt-fill"></i> Adresse</label>
                          <input type="text" class="form-control" placeholder="124, avenue " aria-label="Username" aria-describedby="basic-addon1">
                          <label for="basic-tel" class="form-label"> <i class="ri-phone-fill"></i> Tel</label>
                          <input type="tel" class="form-control" placeholder="(+243)9876986" aria-label="Phone" aria-describedby="basic-addon1">
                          <label for="basic-tel" class="form-label"> <i class="ri-mail-open-fill"></i> Email</label>
                          <input type="email" class="form-control" placeholder="Adresse" aria-label="Email" aria-describedby="basic-addon1">
                    
                        <h6 style="font-size:medium;"><em>Dur&eacute;e Paiement</em> <span class="text-primary small pt-1 fw-bold">&emsp; Valide &agrave; la Livraison</span></h6>
                          
                        </div>
                      </div>
                      <div class="d-flex align-items-right" style="margin-left:550px;margin-top:-260px;">
                        <div class="ps-3">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bx bxl-shopify"></i>
                          </div>
                        <div class="ps-3">
                          <h6 style="font-size:medium;">Invoice Date</h6><span class="text-muted small pt-2 ps-1">12/08/2023</span>
                          <div><span class="text-primary medium pt-1 fw-bold"> <i class="bi bi-cart-check-fill"></i>SalesPerson</span><span class="text-danger small pt-1 fw-bold"> &emsp; &emsp; Customer Service</span></div>
                          <div><span class="text-primary medium pt-1 fw-bold"> <i class="ri-currency-fill"></i>Currency</span><span class="text-danger small pt-1 fw-bold">&emsp; &emsp; &emsp;&emsp; CDF</span>  </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
                <div >
                    <nav style="width:19%;display:inline-block;">
                      <label for="basic-tel" class="form-label"> <i class="ri-line-fill"></i> Designation</label>
                      <select id="inputArticle" class="form-select">
                        <option selected="" value="">Choose...</option>
                        <?php if(isset($article)) foreach( $article as $article):?>
                            <option value="<?=$article->idArticle?>"><?=$article->Designation?></option>
                        <?php endforeach;?>
                      </select>
                    </nav>
                    <nav style="width:19%;display:inline-block;">
                      <label for="basic-tel" class="form-label"> <i class="ri-filter-2-fill"></i> Quantite <div class="error"></div></label>
                      <input type="number" class="form-control" id="quantite" placeholder="Quantite" aria-label="Quantite" aria-describedby="basic-addon1">
                    </nav>
                    <nav style="width:19%;display:inline-block;">
                      <label for="basic-tel" class="form-label"> <i class="ri-money-dollar-circle-fill"></i> Prix Unitaire</label>
                      <input type="text" id="prixUnitaire" readonly class="form-control" placeholder="Prix unitaire" aria-label="Prix unitaire" aria-describedby="basic-addon1">
                    </nav>
                    <nav style="width:18%;display:inline-block;">
                      <label for="basic-tel" class="form-label"> <i class="ri-money-dollar-circle-fill"></i> Taxe</label>
                      <input type="text" readonly class="form-control" placeholder="Prix unitaire" aria-label="Prix unitaire" aria-describedby="basic-addon1">
                    </nav>
                    <nav style="width:18%;display:inline-block;">
                      <label for="basic-tel"  class="form-label"> <i class="ri-money-dollar-circle-fill"></i> Prix Total</label>
                      <input type="text" id="prixTotal" readonly class="form-control" placeholder="Prix unitaire" aria-label="Prix unitaire" aria-describedby="basic-addon1">
                    </nav>
                </div>
                <button type="button" id="addLigne" class="btn btn-primary"><i class="ri-add-box-fill"></i> Add</button> 
                </form> 
              <!-- Table with stripped rows -->
              <table class="table datatable table-striped" id="maTable">
                <thead>
                  <tr>
                    <th scope="col">Produit</th>
                    <th scope="col">Description</th>
                    <th scope="col">Quantite</th>
                    <th scope="col">Prix unitaire</th> 
                    <th scope="col">Taxes</th>
                    <th scope="col">Prix Total</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>               
                    <tr>
                      <td>1</td>
                      <td>Rallonge</td>
                      <td>1</td>
                      <td>3500</td>
                      <td>0</td>
                      <td>3500</td>
                      <td><button id="removeLigne" type="button" name="0" class="btn btn-danger "><i class="bx bxs-trash"></i></button></td>
                    </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              
            </div>
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12" style="margin-top:-100px;">
              <div class="card info-card customers-card">

                <div class="card-body">
                <div class="d-flex align-items-center" style="width:400px;">
                  
                  <div class="ps-3">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th class="text-success small" scope="col">Tax Description</th>
                            <th class="text-success small" scope="col">Tax Account</th>
                            <th class="text-success small" scope="col">Amount</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Purchase Tax 16.00%</td>
                            <td>28</td>
                            <td>2016-05-25</td>
                          </tr>
                          
                        </tbody>
                      </table> 
                </div>
                </div>
                <div class="d-flex align-items-right" style="margin-left:550px;margin-top:-100px;width:400px;">
                    <div class="ps-3">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th class="text-success small" scope="col">UnTaxed Amount</th>
                                <th class="text-success small" scope="col">Tax</th>
                                <th class="text-success small" scope="col">Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Designer</td>
                                <td>28</td>
                                <td>2016-05-25</td>
                              </tr>
                            </tbody>
                          </table> 
                    </div>
                </div>            
              </div>
            </div>
               
            </div><!-- End Customers Card -->
          </div>
          <button type="button" class="btn btn-primary"><i class="bi bi-calculator-fill"></i> Calculate </button>  
          <button id="savefacture" type="button" class="btn btn-primary"><i class="ri-save-3-fill"></i> Save</button>
        </div>

      </div>
    </section>

  </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include_once 'forms/footer.php' ?>
   <!-- ======= Footer ======= -->
   <script>
      $(document).ready(function(){
          $("#inputArticle").on("change",function(){
             var inputArticle= $(this).val()
             if(inputArticle){
                  $.ajax({
                    type: "POST",
                    url: "<?=base_url('Facture/getPrix/')?>"+inputArticle,
                    success: function (response) {
                      $("#prixUnitaire").val(response)
                    }
                  });
             }else{
                $("#prixUnitaire").val("selectionner un article")
             }
           
          });
            document.querySelector("#quantite").addEventListener('input',(e)=>{
               var prixUnitaire=parseFloat( $("#prixUnitaire").val())
              if(parseInt(e.currentTarget.value) < 1 ){
                  $(".error").html('saisissez la bonne valeur<i class="bi bi-exclamation-triangle me-1"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>').addClass("alert alert-warning alert-dismissible fade show")
                 
              }else{
                 if(prixUnitaire){
                  $("#prixTotal").val(parseInt(e.currentTarget.value) * prixUnitaire)        
                 }else{
                  $(".error").html("Selectionner un Article")
                 }
              
              }
               
            });
            document.querySelector("#quantite").addEventListener('change',(e)=>{
               var prixUnitaire=parseFloat( $("#prixUnitaire").val())
              if(parseInt(e.currentTarget.value) < 1 ){
                  $(".error").html('saisissez la bonne valeur<i class="bi bi-exclamation-triangle me-1"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>').addClass("alert alert-warning alert-dismissible fade show")
                 
              }else{
                 if(prixUnitaire){
                  $("#prixTotal").val(parseInt(e.currentTarget.value) * prixUnitaire)        
                 }else{
                  $(".error").html("Selectionner un Article")
                 }
              
              }
               
            });
            let count=1
            $("#addLigne").on("click",(e)=>{
                var id=$("#inputArticle").val()
               
                
                var quantite=$("#quantite").val()
                var prixUnitaire=  $("#prixUnitaire").val()
                var designation=document.querySelector("#inputArticle").selectedOptions[0]['innerHTML']
                var prixTotal =  $("#prixTotal").val()
                 //const table =  $("#maTable > tbody")
                 const table=document.querySelector("#maTable")
                if((id != null) && (quantite !== null) && (prixUnitaire !== null) && (designation.length > 2) && (prixTotal !== null)){
                  var rows =table.insertRow(table.length),
                  cell1=rows.insertCell(0)
                  cell2=rows.insertCell(1)
                  cell3=rows.insertCell(2)
                  cell4=rows.insertCell(3)
                  cell5=rows.insertCell(4)
                  cell6=rows.insertCell(5)
                  cell7=rows.insertCell(6)
                  cell1.innerHTML=count
                  cell2.innerHTML=designation
                  cell3.innerHTML=quantite
                  cell4.innerHTML=prixUnitaire
                  cell5.innerHTML=0
                  cell6.innerHTML=prixTotal
                  cell7.innerHTML='<button id="removeLigne" name="'+count+'" type="button" class="btn btn-danger "><i class="bx bxs-trash"></i></button>'
                  //table.append('<tr><td> '+count+'</td><td> '+designation+'</td><td>'+quantite+'</td><td> '+prixUnitaire+'</td><td> 0</td><td>'+prixTotal+'</td> <td ><button id="removeLigne" type="button" class="btn btn-danger "><i class="bx bxs-trash"></i></button></td></tr>')
                  count++;

                    $('button#removeLigne').on("click",(e)=>{
                            e.stopPropagation(e.currentTarget.name)
                         
                            var index=parseInt(e.currentTarget.name);
                            console.log(index);
                            if(index >=0){
                              console.log(index);
                              table.deleteRow(index-1);
                            
                             
                            }else{
                              console.log(index);
                              table.deleteRow(0);
                              var taille=table.length;
                             
                            }
                           
                           
                          
                        })
                   
                  }
                    else{
                    $(".error").html('Veuillez remplir toutes les valeurs <i class="bi bi-exclamation-triangle me-1"></i><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>').addClass("alert alert-warning alert-dismissible fade show")
                    }
                });

               $("button#savefacture").on("click",(e)=>{
                  var element=$("#facturePrint")
                  console.log(element);
                  window.print(element);
               })
            
              $("button.removeLigne").on("click",(e)=>{
                alert("bonjour")
              });
              

              const tabs=$('#maTable tr')
               $(".removeLigness").on("click",(e)=>{
                      tabs.each(function(e){
                        console.log(tabs)
                      var identifiant = tabs.find("td").html()
                      console.log(identifiant)
                  });
               });
               
           // 
      })
   </script>
</body>

</html>