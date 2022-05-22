<form action="/" method="post">
    <?php
    $currentArticle = $_POST ? $_POST["article"] : 'Nummer här!';
    ?>
    <label class="block text-sm font-medium text-gray-700" for="article">Artikelnummer </label>
    <input type="number" id="article" name="article"
           value="<?php echo $currentArticle; ?>" class="shadow-sm focus:ring-indigo-500 p-3 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">
    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <input type="submit" value="Kolla storlek!" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
    </div>
</form>