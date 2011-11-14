<div class="list">
  <div class="list_head">
    Branch list
    <div class="right">
      <?php echo link_to('Synchronize', 'default/branchesSynchronize', array('title' => 'Synchronize branches', 'query_string' => 'repository='.$repository->getId(), 'class' => 'branch-sync')) ?>
    </div>
  </div>
  <div class="list_body" id="project_list">
    <table>
      <?php foreach ($branches as $branch): ?>
      <tr>
        <td class="review_request">
        <?php if($branch['ReviewRequest'] === 1) : ?>
          <span class="review_request_icon"></span>
        <?php endif; ?>
        </td>
        <td>
          <h3><?php echo link_to(stringUtils::displayBranchName($branch['Name']), 'default/fileList', array('query_string' => 'branch='.$branch['Id'])) ?></h3>
        </td>
        <td class="view_infos">
          <?php echo $branch['total'].' files : ' ?>
        </td>
        <td class="view_infos left">
          <span class="added"><?php echo $branch['added'] ?></span> <span class="modified"><?php echo $branch['modified'] ?></span> <span class="deleted"><?php echo $branch['deleted'] ?></span>
        </td>
        <td class="status">
          <?php echo link_to('Valider', 'default/branchToggleValidate', array('title' => 'Validate branch', 'query_string' => 'branch='.$branch['Id'], 'class' => 'toggle status-valid '. ($branch['Status'] !== BranchPeer::OK ? 'disabled' : ''))) ?>
          <?php echo link_to('Invalider', 'default/branchToggleUnvalidate', array('title' => 'Invalidate branch', 'query_string' => 'branch='.$branch['Id'], 'class' => 'toggle status-invalid '. ($branch['Status'] !== BranchPeer::KO ? 'disabled' : ''))) ?>
        </td>
        <td class="state">
          <?php echo link_to('Blacklister', 'default/branchBlacklist', array('title' => 'Blacklist branch', 'query_string' => 'branch='.$branch['Id'], 'class' => 'toggle status-blacklist disabled')) ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>
<div class="list">
  <?php include_partial('default/statusAction', array('statusActions' => $statusActions)) ?>
</div>
<div class="list">
  <?php include_partial('default/commentBoard', array('commentBoards' => $commentBoards)) ?>
</div>
