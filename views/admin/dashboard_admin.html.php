
    <section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="far fa-bars"></i>
                </div>
                <div class="search">
                    <i class="far fa-search"></i>
                    <input type="text" placeholder="Search...">
                </div>
            </div>
                <div class="profile">
                    <i class="far fa-bell"></i>
                    <img src="../public/assets/img/pexels-cz-jen-15613792.jpg" alt="">
                </div>
            </div>
            <h3 class="i-name">
                Dashboard
            </h3>
            <div class="values">
                <div class="val-box">
                     <i class="fas fa-users"></i>
                    <div>  
                        <!-- ici mettre du php pour chaque nouveau utilisateur qui s'inscrir le chiffre augmente  -->
                        
                        <h3><?= count($users); ?></h3>
                        
                        <span>New Users</span>   
                    </div>
                </div>    
                <div class="val-box">
                    <i class="fas fa-shopping-cart"></i>
                   <div>  
                       
                       <h3>200,521</h3>
                       <span>Total Orders</span>   
                   </div>
               </div>    
               <div class="val-box">
                <i class="fas fa-acorn"></i>
               <div>  
                   
                   <h3>215,542</h3>
                   <span>Products Sell</span>   
               </div>
           </div>    
            <div class="val-box">
                     <i class="fas fa-dollar-sign"></i>
                    <div>  
                        <h3>$677,89</h3>
                        <span>This Month</span>   
                    </div>
                </div>
            </div>
        


        