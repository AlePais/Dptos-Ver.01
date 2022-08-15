
	
							<ul>
								<?php 
									$query_n1 = "SELECT * FROM `nivel_1` WHERE `n1_tipo` LIKE '$n1_tipo' ORDER BY `n1_nombre` ASC";
									$resultado_n1 = $mysqli->query($query_n1);
									while($contenido_n1 = $resultado_n1->fetch_array(MYSQLI_ASSOC))
									{
										$n1_id = $contenido_n1['n1_id'];
										$n1_nombre = $contenido_n1['n1_nombre'];
										$n1_corregido_lista = $contenido_n1['n1_corregido'];
								?>
								<li class="has-sub"><a title="<?php echo $n1_nombre?>" href="<?php echo $raiz."productos/".$n1_corregido_lista?>"><?php echo $n1_nombre?></a>
									<ul>
										<?php 
											$query_n2 = "SELECT * FROM `nivel_2` WHERE `n1_id` = '$n1_id' AND `n2_tipo` LIKE '$n2_tipo' ORDER BY `n2_nombre` ASC";
											$resultado_n2 = $mysqli->query($query_n2);
											while($contenido_n2 = $resultado_n2->fetch_array(MYSQLI_ASSOC))
											{
												$n2_id = $contenido_n2['n2_id'];
												$n2_nombre = $contenido_n2['n2_nombre'];
												$n2_corregido = $contenido_n2['n2_corregido'];
										?>
										<li class="has-sub">
											<a title="<?php echo $n2_nombre?>" href="<?php echo $raiz."productos/".$n1_corregido_lista."/".$n2_corregido?>"><?php echo $n2_nombre?></a>
											<ul>
												<?php 
													$query_n3 = "SELECT * FROM `nivel_3` WHERE `n1_id` = '$n1_id' AND `n2_id` = '$n2_id' AND `n3_tipo` LIKE '$n3_tipo' ORDER BY `n3_nombre` ASC";
													$resultado_n3 = $mysqli->query($query_n3);
													while($contenido_n3 = $resultado_n3->fetch_array(MYSQLI_ASSOC))
													{
														$n3_id = $contenido_n3['n3_id'];
														$n3_nombre = $contenido_n3['n3_nombre'];
														$n3_corregido = $contenido_n3['n3_corregido'];
												?>
												<li class="has-sub">
													<a title="<?php echo $n3_nombre?>" href="<?php echo $raiz."productos/".$n1_corregido_lista."/".$n2_corregido."/".$n3_corregido?>"><?php echo $n3_nombre?></a>
												</li>
												<?php
													}
												?>
											</ul>
										</li>
										<?php
											}
										?>
									</ul>
								</li>
								<?php
									}
								?>
							</ul>
					
						