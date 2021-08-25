


      <?php 
        if($user_type=='admin'){
          echo 'Admin profile';
        }
        elseif($user_type=='user'){
          echo 'User profile';
        }
      ?>
      <div class="row">
        <div class="col mt-4 mx-2">
          
          <table class="table">
          <h3 class="mb-3">All books<h3>
            <thead>
              <tr>
                <th scope="col">name</th>
                <th scope="col">author</th>
                <th scope="col">availablity</th>
              </tr>
            </thead>
            <tbody>
              <?php
              
              
       
              foreach ($books['all_details'] as $value) {
                
                  $availablity=$value['availablity'] ? 'yes': 'no';

                echo "<tr>
                  <td><a class='text-decoration-none' href='book?id=".$value['id']."'>{$value['name']}</td>
                  <td>{$value['author']}</td>
                  <td>$availablity</td>
                </tr>
                  ";

                }
              
              ?>


    
            </tbody>
          </table>
        </div>
        <div class="col mt-4 mx-2">

             
           <ul class='list-group list-group-flush'>
              <b class="mb-3">Unavailable books</b>
        <?php
              
              if(isset($books['unavailable'])){
              foreach ($books['unavailable'] as $value) {
                
                 echo "<li class='list-group-item'>{$value['name']}</li>";

              }
            }
            
            ?>
            </ul>
        </div> 

                <div class="col mt-4 mx-2">

             
           <ul class='list-group list-group-flush'>
              <b class="mb-3">Available books</b>
        <?php
              

              if(isset($books['available'])){
                
              foreach ($books['available'] as $value) {

                // if(isset($books['user_requests']))
               
                
                if(array_search($value['id'],$books['user_requests']??[]) !== false){
                 echo "<li class='list-group-item'>{$value['name']}<a class='btn btn-secondary ml-4' href='request'>Cancel request</a></li>";
                }
                else{

                  echo "<li class='list-group-item'>{$value['name']}<a class='btn btn-primary ml-4' href='request?uid=".$_COOKIE['uid']."&bid=".$value['id']."'>Borrow request</a></li>";

                }

              }
            }
            
            ?>
            </ul>
        </div>
      </div>

      <div class="mt-5">
        <h3>
          Your borrowed books
        </h3>
        <?php

     if(isset($books['user_borrows'])) {  $userBorrows=$books['user_borrows'];

        echo "<ul class='list-unstyled'>";
        foreach ($userBorrows as  $borrow) {

          foreach ($books['all_details'] as $book) {  

            if($book['id']==$borrow){

              echo "<li>{$book['name']}</li>";

            }

          }


        }
        echo "</ul>";

      }



        ?>

       </div> 


