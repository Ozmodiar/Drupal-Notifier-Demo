<?php

function notifier_demo_example_page() {
  return DIC::service('notifier_demo.example_page')->buildPage();
}
