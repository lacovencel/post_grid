# Guide to Add a New Skin
Below are the steps to follow in order to add a new skin into the Post Grid plugin.

## Adding the new skin
1. Open the file **/includes/class-functions.php**.
2. Locate the function skins(), which is typically found around line 525.
3. Inside the **skins() function**, you'll find an array named $skins. This array contains the definitions of different skins.
4. To add a new skin, add a new item to the **$skins array**. Each skin is defined as an associative array with keys like 'slug', 'name', and 'thumb_url'.
5. Create a new array item following the same structure as the existing ones. Make sure to **provide new values** for 'slug', 'name', and 'thumb_url'.
   ```php
        'flat'=> array(
                'slug'=>'flat',									
                'name'=>'Flat',
                'thumb_url'=>'',
                ),	
   ```
6. Save the changes to the file once you've added the new skin.

## Adding styles to the newly created skin
1. Open the file **/assets/global/css/style.skins.css**.
2. In the CSS file, include the desired **styles** for the newly created skin.
3. Ensure that the main container is named with the class **.skin.[slug]**, where the slug has been defined in the previous step.
4. **.layer-content** defines the text content, and **.layer-media** defines the photo content.
5. It's recommended to add a preceding **comment** with the name of the skin for easy identification.
6. Save the changes to the file once you've added the new styles.
