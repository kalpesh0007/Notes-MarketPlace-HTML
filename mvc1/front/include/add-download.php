<?php

session_start();
include 'connection.php';

if(isset($_GET['note_id']) && ($_GET['buyer_id'])){
    $note_id = $_GET['note_id'];
    $buyer_id = $_GET['buyer_id'];

    /* For update query in downloads table */

    $pathquery = "SELECT * FROM seller_notes_attachements WHERE NoteID = $note_id";
    $query = mysqli_query($connection, $pathquery);
    $row = mysqli_fetch_assoc($query);

    $path = $row['FilePath'];
     
    $updatequery = "UPDATE downloads SET IsSellerHasAllowedDownload = 1, AttachmentPath = '$path', IsAttachmentDownloaded = 1 WHERE Downloader = $buyer_id AND NoteID = $note_id";
    $query = mysqli_query($connection, $updatequery);

    if($query){
        header('Location:../include/buyer-requests.php');
    }
    else{
        ?>
		<script>
			alert("Note is not added in Buyer Download Tab");
		</script>
		<?php
    }
}

?>