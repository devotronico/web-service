<main>
<div class="row mb-2 justify-content-center">
  <div class="col-auto ">
    <a class="btn btn-primary form-btn" href="/load">Carica Dati</a>
  </div>
  <div class="col-auto">
    <a class="btn btn-danger form-btn" href="/reset">Cancella tutto</a>
  </div>
</div>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Email</th>
      <th scope="col">Birth</th>
      <th scope="col">Country</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($users as $user) : ?> 
      <tr>
        <th scope="row"><a href="/post/<?=$user->id?>"><?=$user->id?></a></th>
        <td><?=$user->name?></td>
        <td><?=$user->gender?></td>
        <td><?=$user->email?></td>
        <td><?=$user->birth?></td>
        <td><?=$user->country?></td>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>
</main>

