<style>
    @import url("https://fonts.googleapis.com/css2?family=Inter&display=swap");
    .quantity-control {
        margin-top:20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: fit-content;
        background: #eaeaea;
        border-radius: 10px;
        padding: .4rem 0.3rem;
    }
    .quantity-btn {
        background: transparent;
        outline: none;
        margin: 0;
        padding: 0px 8px;
        cursor: pointer;
        border: none;
        padding: 10px;
    }
    .quantity-btn svg {
        width: 15px;
        height: 15px;
    }
    .quantity-input {
        outline: none;
        user-select: none;
        text-align: center;
        width: 47px;
        display: flex;
        appearance: none;
        align-items: center;
        justify-content: center;
        background: transparent;
        border: none;
    }
    .quantity-input::-webkit-inner-spin-button,
    .quantity-input::-webkit-outer-spin-button {
        appearance: none;
        margin: 0;
    }
@media only screen and (max-width: 600px) {

    .quantity-control {
        padding: .1rem 0.2rem;

    }
    .quantity-input {
        width: 20px;
    }
}
</style>
<div class="quantity-control" data-quantity="">
    @if($order->status->value ==0)
    <button class="quantity-btn   decrease" id="increase" data-quantity-minus="">
        <svg viewBox="0 0 409.6 409.6">
            <g>
                <g>
                    <path d="M392.533,187.733H17.067C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h375.467 c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z" />
                </g>
            </g>
        </svg>
    </button>
    @endif
<input type="number" min="1" class="quantity-input pop" disabled data-quantity-target="" value={{$item->quantity}} step="1" min="1" max="" name="quantity">
@if($order->status->value ==0)
<button class="quantity-btn increase"  data-quantity-plus=""><svg viewBox="0 0 426.66667 426.66667">
            <path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0" /></svg>
    </button>
    @endif
</div>

