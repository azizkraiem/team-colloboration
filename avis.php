<?php require APPROOT .'./views/inc/header.php'; ?>


<div class="container">
    <div class="row">
        <h2>donnez un avis</h2>
    </div>
    <div class="row">
    <form method="post" style="width: 100%;" action="<?php echo URLROOT ;?>/pages/avis" >
    
<input type="number" name="client" placeholder="id client" />
<select style="width: 100%;" class="form-select" aria-label="Default select example" name="chauff">
  <option selected>choisir un chauffeur</option>
  <?php foreach ($data as $items) { ?>
   <option value="<?php echo $items->id; ?>"><?php echo $items->name; ?></option>
 <?php } ?>
  
</select >
    <div class="form-group" style="width: 100%;">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea name="avi" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    </div>
</div>




<?php require APPROOT .'./views/inc/footer.php'; ?>