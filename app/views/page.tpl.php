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


<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
  <?php if( $currentPage > 1 ) : ?>
    <li class="page-item"><a class="page-link" href="/page/1">First Page</a></li>
    <li class="page-item"><a class="page-link" href="/page/<?=$currentPage-1?>">Previous</a></li>
  <?php else : ?>  
    <li class="page-item disabled"><a class="page-link">First</a></li>
    <li class="page-item disabled"><a class="page-link">Previous</a></li>
  <?php endif; ?>
  <?php for ( $pageNum=$currentPage-$activeLink; $pageNum<=$pageLast; $pageNum++ ) : ?>
  <?php if ( $pageNum>0 ) : ?>
  <?php if ( $pageNum <= $currentPage + $activeLink && $pageNum >= $currentPage - $activeLink) : ?>
  <?php if( $pageNum==$currentPage ) : ?>
    <li class="page-item active"><a class="page-link -current"><?=$pageNum?></a></li>
  <?php elseif ( $pageNum == $currentPage + $activeLink ) : ?>
    <li class="page-item"><a class="page-link" href="/page/<?=$pageNum?>">...</a></li>
  <?php elseif ( $pageNum == $currentPage - $activeLink) : ?>
    <li class="page-item"><a class="page-link" href="/page/<?=$pageNum?>">...</a></li>
  <?php else : ?>
    <li class="page-item"><a class="page-link" href="/page/<?=$pageNum?>"><?=$pageNum?></a></li>
  <?php endif; ?>
  <?php endif; ?>
  <?php endif; ?>
  <?php endfor; ?>
  <?php if( $currentPage != $pageLast) : ?>
    <li class="page-item"><a class="page-link" href="/page/<?=$currentPage+1?>">Next</a></li>
    <li class="page-item"><a class="page-link" href="/page/<?=$pageLast?>">Last Page</a></li>
  <?php else : ?>
    <li class="page-item disabled"><a class="page-link">Next</a></li>
    <li class="page-item disabled"><a class="page-link">Last Page</a></li>
  <?php endif; ?>
  </ul>
</nav>
