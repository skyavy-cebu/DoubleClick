<h1>Teacher Newsletter</h1>

<table>
  <thead>
    <tr>
      <th>Date Created</th>
      <th>Title</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  
    <?php foreach ($pager->getResults() as $newsletter): ?>
               
                <li>
                  <?php echo date('Y/m/d',strtotime($newsletter->getPublishDate())) ?>
                  <a href="<?php echo url_for('@newsletter-detail?id=' .$newsletter->getId()) ?>"><?php echo $newsletter->getTitle() ?></a>
                </li>
              
               <?php endforeach; ?>
               <?php if ($pager->haveToPaginate()) :?>
                <div id="navv">
                  <?php echo link_to('<<', url_for('@teacher-newsletters?id=' . $teacher['id'] . '&page=' . $pager->getFirstPage()), 'class="pager"')?>
                  <?php echo link_to('<', url_for('@teacher-newsletters?id=' . $teacher['id'] . '&page=' . $pager->getPreviousPage()), 'class="pager"' )?>
                    <?php foreach ($pager->getLinks() as $page) :?>
                    <?php echo ($page == $pager->getPage()) ? $page : link_to($page, url_for('@teacher-newsletters?id='. $teacher['id'] . '&page=' . $page), 'class="pager"')?>
                    <?php endforeach;?>
                  <?php echo link_to('>', url_for('@teacher-newsletters?id=' . $teacher['id'] . '&page=' . $pager->getNextPage()),'class="pager"')?>
                  <?php echo link_to('>>', url_for('@teacher-newsletters?id=' . $teacher['id'] . '&page=' . $pager->getLastPage()), 'class="pager"')?>
                  <?php endif;?>
                </div>
  </tbody>
</table>
