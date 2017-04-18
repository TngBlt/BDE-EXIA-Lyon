<?php $customTitle = "Gallery";

$customHead = "<link rel='stylesheet' href='static/css/gallery/base.css'/>
<link rel='stylesheet' href='static/css/gallery/component.css'/>";


include "includes/header.php"; ?>

    <div class="section-title gallery-title">
        <h2>Gallery</h2>
    </div>

<?php $image_dir = 'gallery' ; ?>

<?php $comments = '{
  "comments": {
    "1": {
      "name":"TngBlt",
      "content":"Utque aegrum corpus quassari etiam levibus solet offensis.",
      "date":"2016-07-14"
      },
    "2": {
      "name":"Juncaaa",
      "content":"Utque aegrum corpus quassari etiam levibus solet offensis, ita animus eius angustus et tener, quicquid increpuisset.",
      "date":"2016-07-14"
      },
      "3": {
      "name":"Epickiwi",
      "content":"Utque aegrum corpus quassari etiam levibus solet offensis, ita animus eius angustus et tener.",
      "date":"2016-07-14"
      }
  }
}';

$comments = json_decode($comments);

?>
<?php include "includes/gallery-items.php"; ?>


<?php include "includes/footer.php"; ?>