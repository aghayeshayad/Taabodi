<button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
    data-target="#kt_modal_{{ $product->id }}">
    قیمت محصول
</button>

<div class="modal fade" id="kt_modal_{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">لیست قیمت محصول</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">رنگ</th>
                            <th scope="col">حجم</th>
                            <th scope="col">سایز</th>
                            <th scope="col">تعداد در بسته</th>
                            <th scope="col">شید</th>
                            <th scope="col">طول</th>
                            <th scope="col">ارتفاع</th>
                            <th scope="col">قطر</th>
                            <th scope="col">زاویه</th>
                            <th scope="col">واحد</th>
                            <th scope="col">دور</th>
                            <th scope="col">نوع ممحصول</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">مبلغ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (collect($product->Prices)->isNotEmpty())
                            @foreach ($product->Prices as $price)
                                <tr>
                                    <td>{{ $price->color }}</td>
                                    <td>{{ $price->volume }}</td>
                                    <td>{{ $price->size }}</td>
                                    <td>{{ $price->count_in_box }}</td>
                                    <td>{{ $price->shead }}</td>
                                    <td>{{ $price->width }}</td>
                                    <td>{{ $price->height }}</td>
                                    <td>{{ $price->diameter }}</td>
                                    <td>{{ $price->angle }}</td>
                                    <td>{{ $price->unit }}</td>
                                    <td>{{ $price->round }}</td>
                                    <td>{{ $price->type }}</td>
                                    <td>{{ $price->count }}</td>
                                    <td>{{ $price->price }}</td>
                                </tr>
                            @endforeach
                        @else
                            <div class="text-center">
                                <strong>لیست قیمتی برای این محصول وارد نشه است.</strong>
                            </div>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
