<div class="modal fade" id="delete_subject<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-white">
      <div class="modal-header">
        <h5 class="modal-title">Delete Subject</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="subject/delete_subject.php?id=<?php echo $row['id']; ?>" method="post">
        <div class="modal-body">
            <p>Are you sure you want to delete the subject: <?php echo $row['subject_code']; ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <button type="submit" name="delete" class="btn btn-secondary">Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>