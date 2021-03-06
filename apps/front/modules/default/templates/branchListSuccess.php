<div class="list">
  <div class="list_head">
    <span class="title">Branch list</span>
    <div class="right">
      <button class="icon loop"><?php echo link_to('Synchronize', 'default/branchesSynchronize', array('title' => 'Synchronize branches', 'query_string' => 'repository='.$repository->getId(), 'class' => 'branch-sync')) ?></button>
    </div>
  </div>
  <div class="list_body" id="project_list">
    <table>
      <?php foreach ($branches as $branch): ?>
      <tr class="<?php echo $branch['reviewRequest'] === 1 ? 'review_request':'' ?>">
        <td class="branch_name">
          <h3><?php echo link_to($branch['name'], 'default/fileList', array('query_string' => 'branch='.$branch['id'])) ?></h3><br />
          <span title="<?php echo $branch['lastCommitDesc'] ?>" class="commit_desc tooltip"><?php echo stringUtils::shorten(stringUtils::trimTicketInfos($branch['lastCommitDesc']), 105) ?></span>
        </td>
        <td class="file_infos">
          <?php echo $branch['total'].' files' ?>
          <?php if($branch['added']): ?><span class="added tooltip" title="<?php echo $branch['added'].' added file(s)'; ?>"><?php echo $branch['added'].'+'; ?></span><?php endif; ?>
          <?php if($branch['modified']): ?><span class="modified tooltip" title="<?php echo $branch['modified'].' modified file(s)'; ?>"><?php echo $branch['modified'].'*'; ?></span><?php endif; ?>
          <?php if($branch['deleted']): ?><span class="deleted tooltip" title="<?php echo $branch['deleted'].' deleted file(s)'; ?>"><?php echo $branch['deleted'].'-'; ?></span><?php endif; ?>
        </td>
        <td class="status">
          <button title="Validated branch <strong><?php echo $branch['name'] ?></strong>" class="tooltip icon success like only-icon <?php echo $branch['status'] === BranchPeer::OK ? 'enabled' : '' ?>"><?php echo link_to('validated', 'default/branchToggleValidate', array('title' => 'Validate branch', 'query_string' => 'branch='.$branch['id'], 'class' => 'toggle')) ?></button>
          <button title="Invalidated branch <strong><?php echo $branch['name'] ?></strong>" class="tooltip icon danger dislike only-icon <?php echo $branch['status'] === BranchPeer::KO ? 'enabled' : '' ?>"><?php echo link_to('invalidated', 'default/branchToggleUnvalidate', array('title' => 'Invalidate branch', 'query_string' => 'branch='.$branch['id'], 'class' => 'toggle')) ?></button>
          <button title="Blacklisted branch <strong><?php echo $branch['name'] ?></strong>" class="tooltip icon remove safe only-icon"><?php echo link_to('blacklisted', 'default/branchBlacklist', array('title' => 'blacklisted branch', 'query_string' => 'branch='.$branch['id'], 'class' => 'toggle')) ?></button>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>
<?php include_partial('default/statusAction', array('statusActions' => $statusActions)) ?>
<?php include_partial('default/commentBoard', array('commentBoards' => $commentBoards)) ?>
