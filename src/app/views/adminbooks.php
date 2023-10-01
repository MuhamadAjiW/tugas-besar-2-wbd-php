<div class="page-container">
    <div class="page-header">
        <h2>List of all Books</h2>

    </div>
    <table class="book-table">
        <thead>
            <tr>
            <th class="book-column">Book ID</th>
            <th class="book-column">Title</th>
            <th class="book-column">Release date</th>
            <th class="book-column">Author</th>
            <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        <tr>
            <td>1</td>
            <td>Aku Suka Kamu</td>
            <td>24 Maret 1998</td>
            <td>Marcel Ryan Antony</td>
            <td><button class="admin-buttons" id="edit-button" style="height:30px">Edit</button>
            <td><button class="admin-buttons" id="delete-button" style="height:30px">Delete</button>            
        </tr>
        <tr>
            <td>2</td>
            <td>Aku Suka Kamu</td>
            <td>24 Maret 1998</td>
            <td>Marcel Ryan Antony</td>
            <td><button class="admin-buttons" id="edit-button" style="height:30px">Edit</button>
            <td><button class="admin-buttons" id="delete-button" style="height:30px">Delete</button>            
        </tr>
        <tr>
            <td>3</td>
            <td>Aku Suka Kamu</td>
            <td>24 Maret 1998</td>
            <td>Marcel Ryan Antony</td>
            <td><button class="admin-buttons" id="edit-button" style="height:30px">Edit</button>
            <td><button class="admin-buttons" id="delete-button" style="height:30px">Delete</button>            
        </tr>
        <tr>
            <td>4</td>
            <td>Aku Suka Kamu</td>
            <td>24 Maret 1998</td>
            <td>Marcel Ryan Antony</td>
            <td><button class="admin-buttons" id="edit-button" style="height:30px">Edit</button>
            <td><button class="admin-buttons" id="delete-button" style="height:30px">Delete</button>            
        </tr>
    </table>
</div>

<div class="delete-modal">
    <div class="delete-modal-content">
        <div class="delete-container">
            <h1 class = "delete-modal-title">Delete Book</h1>
            <p class = "delete-modal-text">Are you sure you want to delete this book?</p>

            <div class="delete-modal-buttons">
                <button type="button" class="delete-modal-btn" id="cancel-delete-btn">Cancel</button>
                <button type="button" class="delete-modal-btn" id="delete-book-btn">Delete</button>
            </div>
        </div>
    </div>
</div>

<script> // Modal for book deletion
    // Get the modal
    var deletemodal = document.getElementsByClassName("delete-modal")[0];
    
    // Get the open modal button
    var openmodalbtn = document.getElementById("delete-button");

    // Get the delete button
    var deletebtn = document.getElementById("delete-book-btn");

    // Get the cancel button
    var cancelbtn = document.getElementById("cancel-delete-btn");
    
    openmodalbtn.onclick = function() {
        deletemodal.style.display = "block";
    }

    cancelbtn.onclick = function() {
        deletemodal.style.display = "none";
    }

    // ntar diganti kalau udah jadi
    deletebtn.onclick = function() {
        deletemodal.style.display = "none";
    }

</script>