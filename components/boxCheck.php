<style>
    * {
        border-radius: 3%;
    }

    #boxCheck {
        box-sizing: border-box;
        width: 100%;
        height: 600px;
        background-color: #EEE;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
    }

    .boxExample {
        box-sizing: border-box;
        padding: 10px;
        text-align: center;
        border: 1px darkgoldenrod solid;
    }

    #articleBox {
        border: 1px darkorange dotted;
        background-size: contain;
        color: goldenrod;
        text-shadow: 1px 1px black;
        font-variant: all-small-caps;
        transform: translateY(0px);
        transition-delay: 0.5s;
        transition: all 0.3s ease-out;
    }

    #boxCheck:hover #articleBox {
        transform: translateY(calc(600px - 100%));
        transition: all 0.8s ease-in;
    }

    .pseudo {
        height: 40%;
    }

    #xxl {
        width: 600px;
        height: 600px;
        transition-delay: 1.5s;
        transition: all 0.8s ease-in;
    }

    #xs {
        width: 120px;
        height: 180px;
        transition-delay: 1.5s;
        transition: all 0.8s ease-in;
    }
</style>

<div id="formErrorBox" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-5 rounded relative" role="alert">
    <strong class="font-bold">Åh nej!&nbsp;</strong>
    <span id="formError" class="block sm:inline"></span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
</div>
<div id="boxCheck">
    <div class="boxExample" id="articleBox"></div>
    <div class="pseudo"></div>
    <div class="boxExample" id="xxl">XXL</div>
    <div class="boxExample" id="xs">XS</div>
</div>

<script type="text/javascript">
    <?php
    use DVDoug\BoxPacker\VolumePacker;
    use DVDoug\BoxPacker\Test\TestBox;
    use DVDoug\BoxPacker\Test\TestItem;
    use DVDoug\BoxPacker\ItemList;

    $xxlBox = new TestBox('XXL', 600, 600, 600, 10, 600, 600, 600, 20000);
    $xsBox = new TestBox('XS', 120, 180, 80, 10, 120, 180, 80, 5000);


    if ($_POST && $_POST['article']) {
        $articleResponse = getArticleById($_POST['article']);
        if (substr($articleResponse, 0, 5) != "Error") {
            $article = json_decode($articleResponse, true);
            updateElementById("articleBox", "innerHTML", $article['name']);
            updateElementById("articleBox", "style.width", $article['product_stocks'][0]['width']);
            updateElementImageById("articleBox", 'https://static.partyking.org/fit-in/1300x0/products/original/' . $article['product_pictures'][0]['image_name'] . '.jpg');

            $xxlColor = canContain($xxlBox, $article['product_stocks'][0]) ? "#00EE00" : "#EE0000";
            updateElementById("xxl", "style.borderColor", $xxlColor);

            $xsColor = canContain($xsBox, $article['product_stocks'][0]) ? "#00EE00" : "#EE0000";
            updateElementById("xs", "style.borderColor", $xsColor);

            updateElementById("formError", "innerHTML", "");
            updateElementById("formErrorBox", "style.display", "none");
        } else {
            updateElementById("formError", "innerHTML", substr($articleResponse, 7));
            updateElementById("formErrorBox", "style.display", "flex");
        }
    }

    function updateElementById($id, $param, $value)
    {
        echo 'document.getElementById("' . $id . '").' . $param . ' = "' . $value . '";';
    }

    function updateElementImageById($id, $href)
    {
        echo 'document.getElementById("' . $id . '").style.backgroundImage = "url(\'' . $href . '\')";';
    }

    function canContain($box, $item)
    {
        $items = new ItemList();
        $items->insert(new TestItem('Article', $item['width'], $item['height'], $item['depth'], $item['weight'], false));

        $volumePacker = new VolumePacker($box, $items);
        $packedBox = $volumePacker->pack();

        $packedItems = $packedBox->getItems();
        foreach ($packedItems as $packedItem) {
            return true;
        }

        return false;
    }
    ?>
</script>
