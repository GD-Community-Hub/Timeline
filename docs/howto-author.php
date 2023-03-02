<!DOCTYPE html>
<html>

<head>
    <title>How to: Author - GDT</title>
    <?php require "../data/header-html.php"; ?>
</head>

<body data-nav="false">
    <main>
        <h1><b>Author Central: Masters Guide</b></h1><br>
        <h3>You're already an Author, so how to use the <a href="../adminspace/author-central.php">Author Central</a>?
        </h3><br>
        <h2>What are the properties?</h2>
        <div class="docs-wrapper">
            <div>
                <img src="../img/author-form.png" class="help-img" alt="The author form."><br><br>
                <i class="alt-text">This is the form you'll see after loading in the <a
                        href="../adminspace/author-central.php">Author Central</a>.</i>
            </div>
            <ul>
                <li>The first entry is the <b>name</b>. It's the main thing you'll see about the event in the Timeline,
                    it's just the text on the card.</li>
                <li>The second input field is almost the most important one, and it's the <b>date</b> of when the event
                    happened. This will determine the horizontal position of the event.</li>
                <li>The third one is optional. In case that you want some event that lasts instead of just happening,
                    you enter the <b>End Date</b>.</li>
                <li>The <b>description</b> is the text that shows up after hovering over the event. This should be some
                    clarificarion info about the event.</li>
                <li>Then there are the options. The first one of them is the group: you choose which category the event
                    fits best in.</li>
                <li>
                    The second customization option is the type of event that will be displayed. The options can be seen
                    bellow:<br><br>
                    <div>
                        <img src="../img/box.jpg" class="smol-img" alt="Box" style="margin-left: 20%;">
                        <img src="../img/point.jpg" class="smol-img" alt="Point">
                        <img src="../img/range.jpg" class="smol-img" alt="Range">
                    </div>
                </li><br><br>
                <li>Then there are the two buttons: the <b>"Submit"</b> button sends the info to Editors to validate,
                    and the <b>"Reset"</b> button clears all of the data you've written.</li>
            </ul>
        </div>
        <h2>There will be more, but for now, I'm only writing the most important info.</h2><br><br><br><br>
    </main>
    <?php require "../data/footer-html.php"; ?>
</body>

</html>