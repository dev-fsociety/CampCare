<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="success callout" data-closable>
	<p><?= $message ?></p>
	<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
		<span aria-hidden="true">&times;</span>
	</button>
</div>

<script>
	setTimeout('$(".success").slideUp()', 5000)
</script>
