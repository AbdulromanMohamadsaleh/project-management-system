@php
                                            $status = explode(',', $project_detail->STATUS);
                                            $result = end($status);
                                            if ($result == 'workingOn') {
                                                $result = $status[count($status) - 2];
                                            }
                                        @endphp
                                        <span
                                            @switch($result)
                                                @case('New Release')
                                                    <span class="badge rounded-pill text-bg-secondary"  >{{ $result }}</span>
                                                    @break

                                                @case('Approved')
                                                    <span class="badge rounded-pill text-bg-warning"  >{{ $result }}</span>
                                                    @break

                                                @case('Progress')
                                                    <span style="background-color: orange" class="badge rounded-pill "  >{{ $result }}</span>
                                                    @break
                                                @case('Completed')
                                                    <span class="badge rounded-pill text-bg-success"  >{{ $result }}</span>
                                                    @break
                                                @default
                                                    {{-- <span class="badge rounded-pill 'text-bg-secondary'"  >{{ $status }}</span> --}}
                                            @endswitch
