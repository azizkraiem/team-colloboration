<?php require APPROOT .'./views/inc/header.php'; ?>




<div class="form"  >
  <div class="container">
    <h1>Ajouter un nouveau Chauffeur</h1>
    <form method="post" action="<?php echo URLROOT ;?>/admin/addchauff" >
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="validationDefault01">Nom & prenom</label>
          <input
            type="text"
            name="name"
            class="form-control"
            id="validationDefault01"
            placeholder="nomp renom"
            required
          />
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationDefault02">Email</label>
          <input
            type="email"
            name="email"
            class="form-control"
            id="validationDefault02"
            placeholder="email"
            required
          />
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationDefault02">Tél</label>
          <input
            name="tel"
            type="number"
            class="form-control"
            id="validationDefault02"
            placeholder="tel"
            required
          />
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationDefault03">Adresse</label>
          <input
            name="adress"
            type="text"
            class="form-control"
            id="validationDefault03"
            placeholder="adresse"
            required
          />
        </div>
      </div>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
  </div>
</div>

<?php require APPROOT .'./views/inc/footer.php'; ?>
