<?php require APPROOT .'./views/inc/header.php'; ?>


<div class="row" style="margin-top:80px">
    <div class="col-md-8 mx-auto">
        <div class="card bg-light mt-5">
            <div class="card-header card-text">
                <div class="row">
                    <div class="col">
                        <h2 class="card-text">Liste des chauffeurs </h2>
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT ;?>/admin/addchauff" class="btn btn-light pull-right"><i class="fa fa-forward"></i> Ajouter </a>
                    </div>
                    
                </div>
                <p class="card-text">Lorem ipsum dolor sit amet</p>
            </div>
            <div>
           
                <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nom de chauffeur </th>
      <th scope="col">adresse</th>
      <th scope="col">email</th>
      <th scope="col">tél</th>
      <th scope="col">avis</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  <?php
 
                        foreach($data as $item){ ?>
    <tr>
      <th scope="row"><?php echo $item->id; ?> </th>
      <td><?php echo $item->name; ?></td>
      <td><?php echo $item->adress; ?></td>
      <td><?php echo $item->email; ?></td>
      
      <td><?php echo $item->tel; ?></td>
      <td><a href="<?php echo URLROOT; ?>/admin/avischauffeur?id=<?php echo $item->id; ?>">voir plus </a>  </td>
      <td> <a class="btn btn-primary btn-block pull-left"  href="<?php echo URLROOT; ?>/admin/editchauff?id=<?php echo $item->id ; ?>"> editer </a></td>
      <td>
      <form method="POST" action="<?php echo URLROOT;?>/admin?id=<?php echo $item->id; ?>">
                    <input type="hidden" name="id" value="<?php echo $item->id; ?>" >

                    <input type="submit" class="btn btn-primary btn-block pull-left" value="supprimer">

                    </form>
      </td>
    </tr>
    <?php 
 
  } ?>
  </tbody>
</table>
            </div>
        </div>
    </div>
</div>



<?php require APPROOT .'./views/inc/footer.php'; ?>
