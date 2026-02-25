<!DOCTYPE html>
<html
    @if (Config::get('app.locale') == 'ar') lang="ar" data-textdirection="rtl" @else  lang="en" data-textdirection="ltr" @endif>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{!! $child->childFullName() !!}</title>

    <style>
        body {
            font-family: 'almarai', sans-serif;
        }

        .form-box {
            max-width: 800px;
            margin: auto;
            padding: 10px;
            font-size: 9px;
            line-height: 24px;
            font-family: 'almarai', sans-serif;
            color: #555;
            border: 2px solid #333;
        }

        .form-box table {
            width: 100%;
            line-height: inherit;
            text-align: right;
        }

        .form-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .form-box table tr td {
            text-align: left;
        }

        .form-box table tr.top table td {
            padding-bottom: 20px;
        }

        .form-box table tr.top table td.title {
            font-size: 30px;
            line-height: 45px;
            color: #333;
        }

        .form-box table tr.information table td {
            padding-bottom: 40px;
        }

        .form-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .form-box table tr.details td {
            padding-bottom: 20px;
        }

        .form-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .form-box table tr.item.last td {
            border-bottom: none;
        }

        .form-box table tr.total td {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .form-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .form-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: 'almarai', sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td {
            text-align: right;
        }

        @page {
            header: page-header;
            footer: page-footer;
        }
    </style>
</head>

<body>


    <div class="form-box {{ config('app.locale') == 'ar' ? 'rtl' : '' }}">

        {{-- header --}}
        <table>

            {{-- images --}}
            <tr class="form-box">
                <td colspan="2">
                    <table>
                        <tr>
                            <td width="20%" class="title" style="">
                                <img src="{!! $picture_of_the_orphan_child !!}"
                                    style="width: 110px;border: 2px solid #333;border-radius: 10px;margin-top: 50px;">
                            </td>
                            <td width="50%">
                                <img src="{!! $image !!}" style="width: 320px;">
                            </td>
                            <td width="20%"></td>
                        </tr>
                    </table>
                </td>
            </tr>


            {{-- title --}}
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td style="text-align: center">
                                <h4> {!! __('children.sponsorship_program_form') !!}</h4>
                            </td>


                        </tr>
                    </table>
                </td>
            </tr>





        </table>

        {{-- data --}}
        <table style="border: 1px solid #aaa5a5; font-size:12px">
            <tr>
                <td style=" background: #eee;">{!! __('children.full_name') !!}</td>
                <td>{!! $child->childFullName() !!}</td>
                <td style=" background: #eee;">{!! __('children.personal_id') !!}</td>
                <td>{!! $child->personal_id !!}</td>
            </tr>

            <tr>
                <td style=" background: #eee;">{!! __('children.birthday') !!}</td>
                <td>{!! $child->birthday !!}</td>
                <td style=" background: #eee;">{!! __('children.gender') !!}</td>
                <td>{!! $child->childGender() !!}</td>
            </tr>


            <tr>
                <td style=" background: #eee;">{!! __('children.number_of_people_including_mother') !!}</td>
                <td>{!! $child->childFamily->number_of_people_including_mother !!}</td>
            </tr>

            <tr>
                <td style=" background: #eee;">{!! __('children.father_full_name') !!}</td>
                <td>{!! $child->childFather->father_full_name !!}</td>
                <td style=" background: #eee;">{!! __('children.father_personal_id') !!}</td>
                <td>{!! $child->childFather->father_personal_id !!}</td>
            </tr>
            <tr>
                <td style=" background: #eee;">{!! __('children.father_respon_of_death') !!}</td>
                <td>{!! $child->childFather->childFatherResponOfDeath() !!}</td>
                <td style=" background: #eee;">{!! __('children.father_date_of_death') !!}</td>
                <td>{!! $child->childFather->father_date_of_death !!}</td>
            </tr>

            <tr>
                <td style=" background: #eee;">{!! __('children.mother_full_name') !!}</td>
                <td>{!! $child->childMother->mother_full_name !!}</td>
                <td style=" background: #eee;">{!! __('children.mother_personal_id') !!}</td>
                <td>{!! $child->childMother->mother_personal_id !!}</td>
            </tr>

            <tr>
                <td style=" background: #eee;">{!! __('children.guardian_full_name') !!}</td>
                <td>{!! $child->childGuardian->guardian_full_name !!}</td>
                <td style=" background: #eee;">{!! __('children.guardian_personal_id') !!}</td>
                <td>{!! $child->childGuardian->guardian_personal_id !!}</td>
            </tr>
            <tr>
                <td style=" background: #eee;">{!! __('children.guardian_relationship_with_the_child') !!}</td>
                <td>{!! $child->childGuardian->childGuardianRelationshipWithTheChild() !!}</td>
            </tr>

            <tr>
                <td style=" background: #eee;">{!! __('children.address') !!}</td>
                <td>{!! $child->governorate->name . ' ' . $child->city->name . ' ' . $child->address_details !!}</td>

            </tr>


            <tr>
                <td style=" background: #eee;">{!! __('children.authorized_contact_number') !!}</td>
                <td>{!! $child->authorized_contact_number !!}</td>
                <td style=" background: #eee;">{!! __('children.backup_contact_number') !!}</td>
                <td>{!! $child->backup_contact_number !!}</td>
            </tr>

            <tr>
                <td style=" background: #eee;">{!! __('children.health_condition') !!}</td>
                <td style=" background: #eee;">{!! __('children.does_the_child_suffer_from_any_disease') !!}</td>
                <td>{!! $child->childHealthStatus() !!}</td>
            </tr>

            <tr>
                <td style=" background: #eee;">{!! __('children.diseases_the_child_suffers_from') !!}</td>
                <td>{!! $child->disease_clarification !!}</td>
            </tr>
            <tr>
                <td style=" background: #eee;">{!! __('children.researcher_notes') !!}</td>
                <td></td>
            </tr>


        </table>


        {{-- footer --}}
        <table>


            <tr>
                <td>
                    <table style="margin: 40px auto;">
                        <tr>
                            <td width="30%">
                            </td>
                            <td width="35%" class="title" style="margin-bottom:100px">
                                {!! __('children.association_director') !!}
                            </td>
                            <td width="50%">
                                {!! __('children.orphan_program_director') !!}
                            </td>


                        </tr>
                    </table>
                </td>
            </tr>

        </table>

    </div>

</body>
