<section id="left-navigation">
    <!--Left navigation user details start-->
    <div class="user-image">
        <img class='img-responsive'
            src="{{asset( isset(Auth::user()->image) ? Auth::user()->image : 'panel/assets/images/demo/avatar-80.png')}}"
            alt="" width="100" height="100" />
        <div class="user-online-status"><span class="user-status is-online  "></span> </div>
    </div>
    <ul class="social-icon">
        {{-- <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-github"></i></a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-bitbucket"></i></a></li> --}}
    </ul>
    <!--Left navigation user details end-->

    <!--Phone Navigation Menu icon start-->
    <div class="phone-nav-box visible-xs">
        <a class="phone-logo" href="index.html" title="">
            <h1>baseProject</h1>
        </a>
        <a class="phone-nav-control" href="javascript:void(0)">
            <span class="fa fa-bars"></span>
        </a>
        <div class="clearfix"></div>
    </div>

    <!--Phone Navigation Menu icon start-->

    <!--Left navigation start-->
    <!--Left navigation start-->
    <ul class="mainNav">
        <li>
            <a href="{{route('users.edit' , ['id' => Auth::user()->id])}}" id="edit-profile-{{Auth::user()->id}}">
                <i class="fas fa-edit"></i><span>تعديل بيانات الحساب</span>
            </a>
        </li>
        @if( Auth::user()->role == 1 )
        <li>
            <a id="users" href="{{route('users.index')}}" class="{{is_active('users')}}">
                <i class="fa fa-group"></i><span> مسئولي الموقع</span>
            </a>
        </li>
        @endif
        <li>
            <a href="{{route('transactions.index')}}" class="{{is_active('transactions')}}">
                <i class="fas fa-comment-dollar"></i><span> حركة النقدية</span>
            </a>
        </li>
        <li id="editWebsiteMenu">
            <a id="siteInformation" href="#" id="editWebsite">
                <i class="fa fa-edit"></i>
                <span>بيانات الموقع</span>
            </a>
            <ul>
                <li>
                    <a href="{{route('configrations.edit' , ['id' => '1'])}}" class="{{is_active('configrations')}}">
                        <i class="fas fa-edit"></i><span>تعديل بيانات الموقع</span>
                    </a>
                </li>

            </ul>
        </li>

        <li>
            <a href="#">
                <i class="fas fa-building"></i>
                <span>بيانات الشركة</span>
            </a>
            <ul>

                <li>
                    <a href="{{route('branches.index')}}" class="{{is_active('branches')}}">
                        <i class="fas fa-building"></i><span> فروع الشركة </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('departments.index')}}" class="{{is_active('departments')}}">
                        <i class="fas fa-building"></i><span> أقسام الشركة</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('services.index')}}" class="{{is_active('services')}}">
                        <i class="fas fa-building"></i><span> خدمات الشركة </span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-building"></i>
                <span>العملاء</span>
            </a>
            <ul>
                <li>
                    <a href="{{route('clients.index')}}" class="{{is_active('clients')}}">
                        <i class="fa fa-users"></i><span>عملاء الشركة </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('target-clients.index')}}" class="{{is_active('target-clients')}}">
                        <i class="fa fa-users"></i><span>العملاء المستهدفين</span>
                    </a>
                </li>

            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-file-contract"></i>
                <span>أعمال الشركة</span>
            </a>
            <ul>
                <li>
                    <a href="{{route('projects.index')}}" class="{{is_active('projects')}}">
                        <i class="fa fa-building"></i><span>المشاريع</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('contracts.index')}}" class="{{is_active('contracts')}}">
                        <i class="fas fa-file-contract"></i><span> التعاقدات </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('contractdetails.index')}}" class="{{is_active('contractdetails')}}">
                        <i class="fas fa-file-contract"></i><span> تفاصيل التعاقدات </span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{route('clients.index')}}" class="{{is_active('clients')}}">
                <i class="fa fa-users"></i><span>العملاء</span>
                </a>
        </li> --}}
        <li>
            <a href="{{route('teams.index')}}" class="{{is_active('teams')}}">
                <i class="fa fa-group"></i><span> فرق العمل</span>
            </a>
        </li>
    </ul>
    </li>

    <li>
        <a href="#">
            <i class="fas fa-money-bill-wave-alt"></i>
            <span>الحسابات</span>
        </a>
        <ul>
            <li>
                <a href="{{route('installments.index')}}" class="{{is_active('installments')}}">
                    <i class="fas fa-comment-dollar"></i><span> أقساط العملاء</span>
                </a>
            </li>
            <li>
                <a href="{{route('rentandbills.index')}}" class="{{is_active('rentandbills')}}">
                    <i class="fas fa-comment-dollar"></i><span> الالتزامات الشهرية </span>
                </a>
            </li>

            <li>
                <a href="{{route('draws.index')}}" class="{{is_active('draws')}}">
                    <i class="fas fa-money-bill-alt"></i><span> مسحوبات المالك </span>
                </a>
            </li>
            <li>
                <a href="{{route('assets.index')}}" class="{{is_active('assets')}}">
                    <i class="fas fa-file-contract"></i><span> أصول الشركة</span>
                </a>
            </li>
            <li>
                <a href="{{route('monthly-obligations.index')}}" class="{{is_active('monthly-obligations')}}">
                    <i class="fas fa-comment-dollar"></i><span> تفاصيل الالتزامات الشهرية </span>
                </a>
            </li>
            <li>
                <a href="{{route('saves.index')}}" class="{{is_active('saves')}}">
                    <i class="fas fa-archive"></i><span> خزائن الشركة </span>
                </a>
            </li>
            <li>
                <a href="{{route('payment-methods.index')}}" class="{{is_active('payment-methods')}}">
                    <i class="fas fa-comment-dollar"></i><span>طرق الدفع</span>
                </a>
            </li>
            <li>
                <a href="{{route('bankaccounts.index')}}" class="{{is_active('bankaccounts')}}">
                    <i class="fas fa-comment-dollar"></i><span> حسابات البنوك </span>
                </a>
            </li>

            <li>
                <a href="{{route('expensestypes.index')}}" class="{{is_active('expensestypes')}}">
                    <i class="fas fa-comments-dollar"></i><span> أنواع المصروفات </span>
                </a>
            </li>

            <li>
                <a href="{{route('runningcosttypes.index')}}" class="{{is_active('runningcosttypes')}}">
                    <i class="fas fa-comment-dollar"></i><span> أنواع مصاريف التشغيل</span>
                </a>
            </li>
            <li>
                <a href="{{route('contributors.index')}}" class="{{is_active('contributors')}}">
                    <i class="fad fa-users"></i><span>المساهمون</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class="fas fa-building"></i>
            <span> المناطق الجغرافية</span>
        </a>
        <ul>

            <li>
                <a href="{{route('governorates.index')}}" class="{{is_active('governorates')}}">
                    <i class="fas fa-comment-dollar"></i><span> المدن </span>
                </a>
            </li>
            <li>
                <a href="{{route('cities.index')}}" class="{{is_active('cities')}}">
                    <i class="fas fa-comment-dollar"></i><span> المحافظات </span>
                </a>
            </li>
            <li>
                <a href="{{route('areas.index')}}" class="{{is_active('areas')}}">
                    <i class="fas fa-comment-dollar"></i><span> المناطق </span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class="fas fa-money-bill-wave-alt"></i>
            <span>الموارد البشرية </span>
        </a>
        <ul>
            <li>
                <a href="#" class="{{is_active('clientss')}}">
                    <i class="fa fa-users"></i><span>إعدادات الرواتب</span>
                </a>
            </li>
            <li>
                <a href="{{route('employees.index')}}" class="{{is_active('employees')}}">
                    <i class="fad fa-users"></i><span>الموظفين</span>
                </a>
            </li>
            <li>
                <a href="{{route('salaries.index')}}" class="{{is_active('salaries')}}">
                    <i class="fas fa-building"></i><span> الرواتب الشهرية </span>
                </a>
            </li>

            <li>
                <a href="{{route('salary-additions.index')}}" class="{{is_active('salary-additions')}}">
                    <i class="fas fa-building"></i><span> إضافات الراتب </span>
                </a>
            </li>
            <li>
                <a href="{{route('sanctions.index')}}" class="{{is_active('sanctions')}}">
                    <i class="fas fa-building"></i><span> الخصومات </span>
                </a>
            </li>
            <li>
                <a href="{{route('deductions.index')}}" class="{{is_active('deductions')}}">
                    <i class="fas fa-building"></i><span> المستقطعات </span>
                </a>
            </li>
            <li>
                <a href="{{route('client-types.index')}}" class="{{is_active('client-types')}}">
                    <i class="fa fa-users"></i><span>النواع العملاء</span>
                </a>
            </li>
            <li>
                <a href="{{route('jobs.index')}}" class="{{is_active('jobs')}}">
                    <i class="fa fa-group"></i><span> الوظائف المتاحة</span>
                </a>
            </li>
            <li>
                <a href="{{route('excuses.index')}}" class="{{is_active('excuses')}}">
                    <i class="fa fa-group"></i><span>الأعذار</span>
                </a>
            </li>
            <li>
                <a href="{{route('wishlist-employees.index')}}" class="{{is_active('wishlist-employees')}}">
                    <i class="fa fa-users"></i><span>قائمة انتظار الموظفين</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class="fas fa-money-bill-wave-alt"></i>
            <span>المهام</span>
        </a>
        <ul>
            <li>
                <a href="{{route('tasks.index')}}" class="{{is_active('tasks')}}">
                    <i class="fas fa-building"></i><span> المهام الشخصية </span>
                </a>
            </li>
            <li>
                <a href="{{route('visits.index')}}" class="{{is_active('visits')}}">
                    <i class="fas fa-building"></i><span> الزيارات </span>
                </a>
            </li>
        </ul>
    </li>

    <li>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">


            <i class="fa fa-power-off"></i><span>تسجيل الخروج</span>
        </a>

    </li>
    </ul>
    <!--Left navigation end-->
</section>