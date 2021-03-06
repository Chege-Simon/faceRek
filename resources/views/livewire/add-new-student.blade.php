<div>
    <div class="row">
        <div class="col-md-4">

        </div>
        <form  wire:submit.prevent="addNewStudent" class="col-md-4">
            <div class="form-group">
                <label for="material_name">Full Name:</label>
                <input type="text" class="form-control" class="@error('full_name') is-invalid @enderror" wire:model="full_name" id="full_name" required>
                @error('full_name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="Student_ID">Student_ID:</label>
                <input type="text" class="form-control" class="@error('student_ID') is-invalid @enderror" wire:model="student_ID" id="student_ID" required>
                @error('student_ID') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="quantity">Student Picure:</label>
                <input type="text" class="form-control" class="@error('student_picture') is-invalid @enderror" wire:model="student_picture" id="student_picture" required>
                @error('student_picture') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Action</button>
            </div>
        </form>

        <div class="col-md-4"></div>
    </div>
</div>
