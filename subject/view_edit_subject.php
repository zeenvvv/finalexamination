<div class="modal fade" id="edit_subject<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-white">
      <div class="modal-header">
        <h5 class="modal-title">Edit Subject</h5>
        <button type="button" class="btn-close btn-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="subject/edit_subject.php?id=<?php echo $row['id']; ?>" method="post">
        <div class="modal-body">
        <div class="form-floating mb-2 px-2">
        <input type="text" class="form-control" id="id" name="id" placeholder="Enter Id">
        <label for="floatingInput">Id</label>
      </div>
      <div class="form-floating mb-2 px-2">
        <input type="text" class="form-control" id="subject_code" name="subject_code" placeholder="Enter Subject Code">
        <label for="floatingInput">Subject Code</label>
      </div>
      <div class="form-floating mb-2 px-2">
        <input type="text" class="form-control" id="course_id" name="course_id" placeholder="Enter Course Id">
        <label for="floatingInput">Course Id</label>
      </div>
      <div class="form-floating mb-2 px-2">
        <input type="text" class="form-control" id="course_description" name="course_description" placeholder="Enter Course Description">
        <label for="floatingPassword">Description</label>
      </div>
      <div class="form-floating mb-2 px-2">
        <input type="text" class="form-control" id="total_units" name="total_units" placeholder="Enter Total Units">
        <label for="floatingPassword">Total Units</label>
      </div>
      <div class="form-floating mb-2 px-2">
        <input type="text" class="form-control" id="with_lab_component" name="with_lab_component" placeholder="Enter Lab Component">
        <label for="floatingPassword">With Lab Component</label>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="edit" class="btn btn-secondary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>