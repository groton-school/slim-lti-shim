<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>LTI Launch</title>
  <style>
    @keyframes spinner-border {
      to {
        transform: translate(-50%, -50%) rotate(360deg);
      }
    }

    .spinner-border {
      position: absolute;
      top: 50% !important;
      left: 50% !important;
      transform: translate(-50%, -50%);
      height: 15vw;
      width: 15vw;
      display: inline-block;
      vertical-align: -0.125em;
      border-radius: 50%;
      border: 0.25em solid hsla(0, 0%, 50%, 0.75);
      border-right-color: transparent;
      animation: 0.75s linear infinite spinner-border;
    }
  </style>
</head>

<body>
  <div class="spinner-border"></div>
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
    const targetFrame =
      frameName === '_parent' ? parent : parent.frames[frameName];
    const messageId = crypto.randomUUID();
    const state = '<?= $state ?>';

    window.addEventListener('message', function(event) {
      if (
        typeof event.data !== 'object' ||
        event.data.subject !== 'lti.get_data.response' ||
        event.data.message_id !== messageId ||
        event.origin !== platformOrigin
      ) {
        return;
      }

      if (event.data.error) {
        console.error(
          `Error ${event.data.error.code} ${event.data.error.message}`
        );
        return;
      }
      document.getElementById('launch').submit();
    });

    targetFrame.postMessage({
        subject: 'lti.get_data',
        message_id: messageId,
        key: `state_${state}`
      },
      platformOrigin
    );
  </script>
</body>

</html>