function confirmDelete(){
  var conf=confirm('Are you sure you want to remove this book from your Collections?');
  if(conf){
    return true; //perform the task
  }else{
    //will return false, so instead of going to removeFromCollections.php, go back to collections.php
    return false; // Cancel the task
  }
}
