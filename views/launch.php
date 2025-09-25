<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LTI Launch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="progress position-absolute top-50 start-50 translate-middle" role="progressbar" aria-label="Loading&hellip;" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <form id="launch" method="post" action="<?= $action ?>">
        <?php foreach ($post as $key => $value) { ?>
            <input type="hidden" name="<?= $key ?>" value="<?= $value ?>" />
        <?php } ?>
        <input type="hidden" name="<?= $nonce_param ?>" value="<?= $nonce ?>" />
    </form>
    <script type="text/javascript">
        const authLoginUrl = '<?= $authLoginUrl ?>';
        const platformOrigin = new URL(authLoginUrl).origin;
        const frameName = '<?= $lti_storage_target ?>';
        const parent = window.parent || window.opener;
        const targetFrame = frameName === "_parent" ? parent : parent.frames[frameName];
        const messageId = crypto.randomUUID();
        const state = '<?= $state ?>';

        window.addEventListener('message', function(event) {
            if (
                typeof event.data !== "object" ||
                event.data.subject !== "lti.get_data.response" ||
                event.data.message_id !== messageId ||
                event.origin !== platformOrigin
            ) {
                return;
            }

            if (event.data.error) {
                console.error(`Error ${event.data.error.code} ${event.data.error.message}`);
                return;
            }
            document.getElementById('launch').submit();
        });

        targetFrame.postMessage({
            "subject": "lti.get_data",
            "message_id": messageId,
            "key": `state_${state}`,
        }, platformOrigin)
    </script>
</body>

</html>