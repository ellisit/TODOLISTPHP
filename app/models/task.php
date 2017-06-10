<?php


class task extends Eloquent {
    public function mark() {
        $this->done = $this->done ? false : true;
        $this->save();
    }
}       