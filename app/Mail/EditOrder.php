<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EditOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id, $all, $category, $sub_category, $material, $cost)
    {
        $this->id = $id;
        $this->all = $all;
        $this->category = $category;
        $this->sub_category = $sub_category;
        $this->material = $material;
        $this->cost = $cost;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = array(
            'id' => $this->id,
            'all' => $this->all,
            'category' => $this->category,
            'sub_category' => $this->sub_category,
            'material' => $this->material,
            'cost' => $this->cost
        );

        return $this->subject('Order Details')->view('mail.editOrder')->with($data);
    }
}
