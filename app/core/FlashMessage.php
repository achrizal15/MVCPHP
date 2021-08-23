<?php
class FlashMessage
{
    public static function setMessage($message, $type)
    {
        $_SESSION['flash'] = [
            "message" => $message,
            "type" => $type
        ];
    }
    public static function getMessage()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible" role="alert" id="liveAlert">
           ' . $_SESSION['flash']['message'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            unset($_SESSION['flash']);
        }
    }
}
