<style>
    #wrapper {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        display: flex;
    }

    .box {
        width: 50vw;
        padding: 3%;
    }

    .box:first-of-type {
        border-right: 1px black solid;
        min-width: 680px;
    }

    #wrapper img {
        max-width: 100%;
        height: 150px;
    }
</style>


<div id="wrapper">
    <div class="box">
        <div>
            <img class="mx-auto h-12 w-auto" src="logo.png" alt="Partykungens logotyp">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Utrymmeskollaren</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                där du kan se
                <span class="font-medium text-indigo-600 hover:text-indigo-500"> om en artikel får plats</span>
            </p>
        </div>
        <?php
        include "components/baseForm.php";
        include "components/boxCheck.php";
        ?>
    </div>
    <div class="box">
        <?php
        $Parsedown = new Parsedown();
        echo $Parsedown->text(file_get_contents("readme.md"));
        ?>
    </div>

</div>
