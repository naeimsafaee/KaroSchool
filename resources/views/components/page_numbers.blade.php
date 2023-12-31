@if ($paginator->hasPages())

    <div class="panigation">
        <div class=" refrence">
            صفحه {{ fa_number($paginator->currentPage()) }}
            از {{ fa_number(ceil($paginator->total() / $paginator->perPage())) }}
        </div>

        @php
            $index = 0;
        @endphp

        @foreach ($elements as $element)

            @if (is_array($element))
                @foreach ($element as $page => $url)

                    @php
                        $index++;
                    @endphp

                    @if($loop->index > 2)
                        <a class="Ellipse">
                            ...
                        </a>
                        @break
                    @endif

                    @if ($page == $paginator->currentPage())
                        <a href="#" class="Ellipse active" style="justify-content: center !important;width: 40px !important;">
                            {{ fa_number($page) }}
                        </a>
                    @else
                        <a href="{{ $url }}" class="Ellipse" style="justify-content: center !important;width: 40px !important;">
                            {{ fa_number($page) }}
                        </a>
                    @endif

                @endforeach
            @endif
        @endforeach

        @if($index > 3)
            @php
                $element = array_slice($element ,$index - 2, count($element) , true);
            @endphp

            @if (is_array($element))

                <div class="Ellipse custom-selects-1" style="position: relative;">
                    <select style="display: none">
                        @foreach ($element as $page => $url)

                            @if ($paginator->currentPage() > $index && false)
                                <a href="{{ $element[$paginator->currentPage()] }}" class="Ellipse active">
                                    {{ fa_number($paginator->currentPage()) }}
                                </a>
                            @else

                                @if ($page == $paginator->currentPage())
                                    <option value="0" selected>{{ fa_number($page) }}</option>
                                @else
                                    <option value="{{ $url }}">{{ fa_number($page) }}</option>
                                @endif

                            @endif

                        @endforeach
                    </select>
                </div>
            @endif
        @endif
    </div>
@endif

<script>


    var x, i, j, l, ll, selElmnt, a, b, c, tag_a;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-selects-1");
    l = x.length;
    for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /*for each element, create a new DIV that will act as the selected item:*/
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /*for each element, create a new DIV that will contain the option list:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < ll; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            tag_a = document.createElement("A");
            tag_a.innerHTML = selElmnt.options[j].innerHTML;
            tag_a.href = selElmnt.options[j].value;
            tag_a.style.color = "#000";
            c.addEventListener("click", function (e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h, sl, yl;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                sl = s.length;
                h = this.parentNode.previousSibling;
                for (i = 0; i < sl; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        yl = y.length;
                        for (k = 0; k < yl; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            c.appendChild(tag_a);
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function (e) {
            /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }

    function closeAllSelect(elmnt) {
        /*a function that will close all select boxes in the document,
        except the current select box:*/
        var x, y, i, xl, yl, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        xl = x.length;
        yl = y.length;
        for (i = 0; i < yl; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < xl; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }

    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);

</script>
