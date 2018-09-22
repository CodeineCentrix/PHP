
       
        <div>
            <h1 style="text-align: center;">Add a newspaper article</h1> <hr>
            
            <?php if(isset($saved)): ?>
            <?php if($saved==11):?>
            <p>Article was added</p>
            <?php else: ?>
            <p>Article wasn't added, try again</p>
            <?php endif;?>
            <?php endif;?>
            
            <form method="POST" action="?action=add_article" enctype="multipart/form-data" onsubmit="return getArticleBody()">
                
                <div style="width: 85%;margin: auto;overflow: hidden;">
                    <label>Enter Article title</label><br><input type="text" style="width: 50%;height: 40px;" name="article_title" placeholder="Aritcle title" required>
                <br><label>Enter Article author</label><br><input type="text" style="width: 50%;height: 40px;" name="article_author" placeholder="Article Author" required>
                <br><label for="fleImage">Choose Article Image</label> <input type="file" id="fleImage" name="fp_article_image" required><br>

                <br><label>Enter Article Body</label><br>
                
                   <!-- <textarea id="noise" name="noise" class="widgEditor nothing" required></textarea> -->
                   
                   <script src="../Admin/vendor/ckeditor/ckeditor.js"></script>
                    <script src="../Admin/vendor/ckeditor/adapters/jquery.js"></script>
                   <textarea name="article_body" id="editor1" rows="10" cols="80">Type in article body here...</textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
                    
                </div>
              <!--  <input type="hidden" name="article_body" id="article_body">-->
                <script>
                    function getArticleBody(){
                      //var body_text = document.getElementById("noise").value;
                    //   document.getElementById("article_body").value = body_text;
                      var a =  document.getElementById("article_body").value;
                      console.log(a);
                      
                      return false;
                    }
                </script>
            <div style="width: 15%; margin: auto; padding: 5px;">
            <input type="submit" value="Add Article">
            </div>
            </form>
            
        </div>
<br>
<br>
<div>
    <h1 style="text-align: center;">Remove an article</h1> <hr>
    <table class="table table-bordered">
        <thead><th>Article Title</th> <th>Date Posted</th><th>Remove?</th></thead>
    <tbody>
        <?php foreach ($removable as $article): ?>
        <tr>
            <td><?php echo $article[1]; ?></td>
            <td><?php echo date_format($article[2],'Y/m/d H:i:s'); ?></td>
            <td><form method="POST" action="?action=del_article">
                    <input type="hidden" value="<?php echo $article[0]; ?>" name="art_id">
                    <input type="hidden" value="<?php echo $article[3]; ?>" name="art_bdy">
                    <input type="hidden" value="<?php echo $article[4]; ?>" name="art_pic">
                    <input type="image" src="../Resources/Images/rubbish-bin.png">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>
       

