<div class="left-sidebar">
    <?php
        $categories=DB::table('categories')->where([['status',1],['parent_id',0]])->get();
    ?>
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        @foreach($categories as $category)
            <?php
                $sub_categories=DB::table('categories')->select('id','name')->where([['parent_id',$category->id],['status',1]])->get();
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear{{$category->id}}">
                            @if(count($sub_categories)>0)
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            @endif
                        </a>
                            <a href="{{route('cats',$category->id)}}">{{$category->name}}</a>

                    </h4>
                </div>
                @if(count($sub_categories)>0)
                    <div id="sportswear{{$category->id}}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach($sub_categories as $sub_category)
                                    <li><a href="{{route('cats',$sub_category->id)}}">{{$sub_category->name}} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div><!--/category-products-->
</div>

<div class="btn-group">
                                <h3 class="mb-3 h6 text-uppercase text-black d-block">Currency</h3>
                                <h6>Select the currency you want to know.</h6>
                                <select id="mySelect" onchange="myFunction()">
                                    <option value="*USD">$ - USD - U.S. Dollar</option>
                                    <option value="1 USD = 3.8556321322 AED">AED - Arab Emirates Dirham</option>
                                    <option value="1 USD = 0.9189295218 EUR">€ - EUR - Euro</option>
                                    <option value="1 USD = 8.1487148742 HKD">HK$ - HKD - Hong Kong Dollar</option>
                                    <option value="1 USD = 14846.182763388 IDR">RP - IDR - Indonesian Rupiah</option>
                                    <option value="1 USD = 116.324899191 JPY">¥ - JPY - Japanese Yen</option>
                                    <option value="1 USD = 4.3721856082 MYR">MYR - Malaysian Ringgit</option>
                                    <option value="1 USD = 3.8165177409 QAR">QAR - Qatari Riyal</option>
                                    <option value="1 USD = 1.4298181468 SGD">SGD - Singapore Dollar</option>
                                    <option value="1 USD = 0.7965932254 GBP">GBP - Pounds</option>
                                </select>
                                <p id="currency"></p>
                                <script>
                                function myFunction() {
                                    var x = document.getElementById("mySelect").value;
                                    document.getElementById("currency").innerHTML = "Conversion rate: <br> " + x;
                                }
                                </script>
                                
                                
                        </div>